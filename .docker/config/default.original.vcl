#
# This is an example VCL file for Varnish.
#
# It does not do anything by default, delegating control to the
# builtin VCL. The builtin VCL is called when there is no explicit
# return statement.
#
# See the VCL chapters in the Users Guide at https://www.varnish-cache.org/docs/
# and http://varnish-cache.org/trac/wiki/VCLExamples for more examples.

# Marker to tell the VCL compiler that this VCL has been adapted to the
# new 4.0 format.
vcl 4.0;

# Default backend definition. Set this to point to your content server.
backend default {
    .host = "nginx";
    .port = "8080";
    .first_byte_timeout = 300s;
}
sub vcl_recv {
    # Happens before we check if we have this in cache already.
    #
    # Typically you clean up the request here, removing cookies you don't need,
    # rewriting the request, etc.
    set req.backend_hint = default;
    if (req.url ~ "/static") {
        return (hash);
    }   
    if (req.http.host ~ "varnishdashboard.com") {
        set req.backend_hint = default;
    } 
}

sub vcl_synth {
    if (resp.status == 301 || resp.status == 302) {
        set resp.http.location = req.http.location;
        return (deliver);
    }
}

sub vcl_backend_response {
    # Happens after we have read the response headers from the backend.
    #
    # Here you clean the response headers, removing silly Set-Cookie headers
    # and other mistakes your backend does.
    if (bereq.url ~ "/static") {
        unset beresp.http.set-cookie;
        set beresp.http.cache-control = "public, max-age=259200";
        set beresp.ttl = 3d;
        return (deliver);
    }
    if (bereq.url ~ "/pub/media") {
        unset beresp.http.set-cookie;
        set beresp.http.cache-control = "public, max-age=259200";
        set beresp.ttl = 3d;
        return (deliver);
    }
}

sub vcl_deliver {
    # Happens when we have all the pieces we need, and are about to send the
    # response to the client.
    #
    # You can do accounting or modifying the final object here.
}
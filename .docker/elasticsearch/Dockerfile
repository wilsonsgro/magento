from blacktop/elasticsearch:7.10
RUN mkdir -p /usr/share/elasticsearch/jdk/bin
RUN ln -s /usr/lib/jvm/java-11-openjdk/bin/java  /usr/share/elasticsearch/jdk/bin/java 
RUN  /usr/share/elasticsearch/bin/elasticsearch-plugin install analysis-phonetic
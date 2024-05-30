FROM openjdk:8u151-jdk-alpine3.7

EXPOSE 8070

ENV APP_HOME /usr/src/app

COPY target/techconnect_art_id-1.0-SNAPSHOT.jar $APP_HOME/techconnect_art_id-1.0-SNAPSHOT.jar

WORKDIR $APP_HOME

ENTRYPOINT exec techconnect_art_id-1.0-SNAPSHOT.jar
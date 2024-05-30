FROM openjdk:8
EXPOSE 8070
ADD target/techconnect_art_id-1.0-SNAPSHOT.jar techconnect_art_id-1.0-SNAPSHOT.jar
ENTRYPOINT ["java","-jar","/techconnect_art_id-1.0-SNAPSHOT.jar"]
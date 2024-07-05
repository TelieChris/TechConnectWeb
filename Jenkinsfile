pipeline {
    agent any

    tools {
        jdk 'jdk17'
    }

    environment {
        SCANNER_HOME = tool 'sonar-scanner'
        DOCKER_HUB_CREDENTIALS = credentials('DockerCredentials')
    }
    triggers {
         cron('H */12 * * *') // This will schedule the build to run every 12 hours
       // cron('H/5 * * * *') // This will schedule the build to run every 5 minutes
    }

    stages {
        stage('Git Checkout') {
            steps {
                git branch: 'main', 
                    changelog: false, 
                    credentialsId: '89d5394e-ea16-48ab-bbaa-e898817b1738', 
                    poll: false, 
                    url: 'https://github.com/TelieChris/TechConnectWeb.git'
            }
        }
        // -Dsonar.login=squ_6537e0a318ecb2797da51d4a33cb976eaf7661b9 \
        stage('Test Using SonarQube') {
            steps {
                script {
                    def scannerHome = tool name: 'sonar-scanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
                    bat """
                    ${scannerHome}/bin/sonar-scanner \
                        -Dsonar.host.url=http://127.0.0.1:9000/ \
                        -Dsonar.login=squ_a11267a60aa461c2681a42470344d21aba256abd \
                        -Dsonar.projectKey=Techconnect \
                        -Dsonar.projectName=techconnect \
                        -Dsonar.java.binaries=.
                    """
                }
            }
        }
        
        stage('Build & Push Docker Image') {
            steps {
                script {
                    withDockerRegistry(credentialsId: 'DockerCredentials', toolName: 'docker') {
                        bat 'docker --version'  // Check Docker version to ensure it is installed
                        //bat 'docker network create technetwork'
                        bat 'docker build -t techconnect:latest -f Dockerfile .'
                        bat 'docker tag techconnect:latest 50604/techconnect:latest'
                        bat 'docker push 50604/techconnect:latest'
                    }
                }
            }
        }
        stage('Docker Deploy To container') {
            steps {
                script {
                    withDockerRegistry(credentialsId: 'DockerCredentials', toolName: 'docker') {
                        // Stop and remove any existing container named 'techconnect'
                        bat 'docker ps -q --filter "name=techconnect" | findstr . && docker stop techconnect && docker rm techconnect || echo "No existing container to stop"'
                        // Run the new container
                        bat "docker run -d --name techconnect -p 80:80 50604/techconnect:latest"
                    }
                }
            }
        }
    }
}
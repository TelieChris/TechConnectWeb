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
        // cron('H */12 * * *') // This will schedule the build to run every 12 hours
        cron('H/1 * * * *')
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
        
        stage('Test Using SonarQube') {
            steps {
                script {
                    def scannerHome = tool name: 'sonar-scanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
                    bat """
                    ${scannerHome}/bin/sonar-scanner \
                        -Dsonar.host.url=http://127.0.0.1:9000/ \
                        -Dsonar.login=squ_78f316802985a0997b8eca0a9f15bc577ce19b16 \
                        -Dsonar.projectKey=techconnect \
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
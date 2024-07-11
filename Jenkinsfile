pipeline {
    agent any

    tools {
        jdk 'jdk17'
    }

    environment {
        SCANNER_HOME = tool 'sonar-scanner'
        DOCKER_HUB_CREDENTIALS = credentials('DockerCredentials')
        DB_HOST = 'sql12.freesqldatabase.com'
        DB_NAME = 'sql12716221'
        DB_USER = 'sql12716221'
        DB_PASSWORD = 'FfJUdVvA73'
    }
    triggers {
        cron('H */12 * * *') // This will schedule the build to run every 12 hours
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
                        -Dsonar.login=squ_a11267a60aa461c2681a42470344d21aba256abd \
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
                        bat 'docker build -t techconnect:latest -f Dockerfile .'
                        bat 'docker tag techconnect:latest 50604/techconnect:latest'
                        bat 'docker push 50604/techconnect:latest'
                    }
                }
            }
        }
        
        stage('Docker Deploy To Container') {
            steps {
                script {
                    withDockerRegistry(credentialsId: 'DockerCredentials', toolName: 'docker') {
                        // Stop and remove any existing container named 'techconnect " && docker rm techconnect || echo "No existing container to stop"'
                        bat 'docker ps -q --filter "name=techconnect" | findstr . && docker stop techconnect'
                        // Run the new container with environment variables
                        bat """
                        docker run -d --name techconnect -p 8080:80 \
                            -e DB_HOST=${DB_HOST} \
                            -e DB_NAME=${DB_NAME} \
                            -e DB_USER=${DB_USER} \
                            -e DB_PASSWORD=${DB_PASSWORD} \
                            50604/techconnect:latest
                        """
                    }
                }
            }
        }
    }
}

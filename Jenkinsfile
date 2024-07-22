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
                        -Dsonar.login=squ_2fd9258d53da95b22c5215265ca58eed702661b3 \
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
                        // Check if a container named 'techconnect' exists
                        def containerExists = bat(script: 'docker ps -aq --filter "name=techconnect"', returnStdout: true).trim()
                        if (containerExists) {
                            bat "docker stop techconnect || echo 'No such container'"
                            bat "docker rm techconnect || echo 'No such container'"
                        }
                        // Check if port 8080 is available, if not use port 8081
                        def portInUse = bat(script: 'netstat -ano | findstr :8080', returnStdout: true).trim()
                        def port = portInUse ? '8081' : '8080'
                        // Run the new container with environment variables
                        bat """
                        docker run -d --name techconnect -p ${port}:80 \
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

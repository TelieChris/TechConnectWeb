pipeline {
    agent any

    tools {
        jdk 'jdk17'
    }

    environment {
        SCANNER_HOME = tool 'sonar-scanner'
        DOCKER_HUB_CREDENTIALS = credentials('DockerHubCredentials')
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
        
        stage('SonarQube Analysis') {
            steps {
                script {
                    def scannerHome = tool name: 'sonar-scanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
                    bat """
                    ${scannerHome}/bin/sonar-scanner \
                        -Dsonar.host.url=http://127.0.0.1:9000/ \
                        -Dsonar.login=squ_6537e0a318ecb2797da51d4a33cb976eaf7661b9 \
                        -Dsonar.projectKey=techconnect \
                        -Dsonar.projectName=techconnect \
                        -Dsonar.java.binaries=.
                    """
                }
            }
        }
        stage('OWASP SCAN') {
            steps {
                dependencyCheck additionalArguments: ' --scan ./', odcInstallation: 'DP'
                dependencyCheckPublisher pattern: '**/depandency-check-report.xml'
            }
        }
        stage('Build & Push Docker Image') {
            steps {
                script {
                    withDockerRegistry(credentialsId: 'DockerHubCredentials', toolName: 'docker') {
                        bat 'docker --version'  // Check Docker version to ensure it is installed
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
                    withDockerRegistry(credentialsId: 'DockerHubCredentials', toolName: 'docker') {
                        bat "docker run -d --name techconnect -p 8070:8070 50604/techconnect:latest"
                    }
                }
            }
        }
    }
}

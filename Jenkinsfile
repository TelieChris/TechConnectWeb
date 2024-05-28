pipeline {
    agent any
    environment {
        PATH = "${env.PATH};C:/Users/User/AppData/Roaming/npm/yarn"
        
    }

    stages {
        stage('Setup Python Environment') {
            steps {
                script {
                    bat 'python --version'  // Verify Python installation
                    bat 'pip --version'     // Verify pip installation
                    bat 'yarn --version'  // Verify Yarn installation
                }
            }
        }
        stage('run frontend') {
            steps {
                echo 'executing yarn...'
                node('main || Node_10') {
                    bat "npm install -g yarn"
                    bat 'yarn install'
                }
            }
        }
        stage('run backend'){
            steps{
                echo 'executing gradle...'
                withGradle() {
                    bat './gradlew -v'
                }
            }
        }
        stage('Build') {
            steps {
                echo "Building.."
                bat '''
                cd requirements
                pip install -r requirements.txt
                '''
            }
        }
        stage('Test') {
            steps {
                echo "Testing.."
                bat '''
                cd backend
                python hello.py
                python hello.py --name=Brad
                '''
            }
        }
        stage('Deliver') {
            steps {
                echo 'Deliver....'
                bat '''
                echo "doing delivery stuff.."
                '''
            }
        }
    }
}
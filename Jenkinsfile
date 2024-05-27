pipeline {
    agent any
    
    stages {
        stage('Build') {
            steps {
                echo "Building.."
                bat '''
                echo "doing build stuff.."
                '''
            }
        }
        stage('Test') {
            steps {
                echo "Testing.."
                bat '''
                echo "doing test stuff.."
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
pipeline {
    agent any
    
    stages {
        stage('Setup Python Environment') {
            steps {
                script {
                    bat 'python --version'  // Verify Python installation
                    bat 'pip --version'     // Verify pip installation
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
    post {
        success {
            mail to: 'twizeyimana1elia@gmail.com',
             subject: "SUCCESS: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]'",
             body: "Good news, the job ${env.JOB_NAME} build number ${env.BUILD_NUMBER} succeeded."
                }
        failure {
            mail to: 'twizeyimana1elia@gmail.com',
                subject: "FAILURE: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]'",
                body: "The job ${env.JOB_NAME} build number ${env.BUILD_NUMBER} failed. Please check the logs."
                }
        always {
            echo 'Cleaning up...'
            // Cleanup tasks
            bat '''
            echo "Stopping any running services..."
            // Example: stop a service (customize as needed)
            net stop MySQL
            
            echo "Removing temporary files..."
            // Example: remove temp files (customize as needed)
            rmdir /s /q temp
            
            echo "Cleanup completed."
            '''
            
            echo 'Sending notifications...'
            // Example: send notifications
            mail to: 'twizeyimana1elia@gmail.com',
                 subject: "Build ${currentBuild.currentResult}: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]'",
                 body: "The build for ${env.JOB_NAME} build number ${env.BUILD_NUMBER} completed with status: ${currentBuild.currentResult}."
        }
    }
}
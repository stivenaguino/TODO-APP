pipeline {
    agent any
    environment {
        MYSQL_CONTAINER_NAME = "mysql-container-${env.BUILD_NUMBER}"
        APP_CONTAINER_NAME = "app-container-${env.BUILD_NUMBER}"
    }
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        stage('Build') {
            steps {
                sh 'docker-compose build'
            }
        }
        stage('Deploy') {
            steps {
                sh 'docker-compose up -d'
            }
        }
    }
    post {
        always {
            echo 'Pipeline ejecutado, revisa los logs para más detalles si es necesario.'
        }
        failure {
            echo 'El pipeline ha fallado.'
        }
    }
}

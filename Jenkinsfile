pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        
        stage('Clean Up') {
            steps {
                // Detener y eliminar contenedores existentes
                sh '''
                    docker-compose down || true
                    # Forzar eliminación de contenedores si existen
                    docker rm -f mysql-container php-container phpmyadmin-container || true
                '''
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
            // Limpieza en caso de fallo
            sh 'docker-compose down || true'
        }
        success {
            echo 'Pipeline ejecutado exitosamente!'
        }
        failure {
            echo 'El pipeline ha fallado'
        }
    }
}
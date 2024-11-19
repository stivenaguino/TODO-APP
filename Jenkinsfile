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
                sh '''
                    # Detener y eliminar contenedores específicos
                    docker stop jenkins-container || true
                    docker rm jenkins-container || true
                    
                    # Detener y eliminar cualquier otro contenedor asociado al proyecto
                    docker-compose down || true
                    
                    # Eliminar redes y volúmenes residuales
                    docker network rm app-network || true
                    docker volume prune -f || true
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

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
                    # Detener y eliminar todos los contenedores relacionados con este proyecto
                    docker-compose down || true
                    docker rm -f $(docker ps -a -q --filter "name=todo-list-pipeline") || true
                    
                    # Eliminar redes asociadas
                    docker network rm $(docker network ls --filter "name=todo-list-pipeline" -q) || true
                    
                    # Limpiar volúmenes
                    docker volume rm $(docker volume ls -f "name=todo-list-pipeline" -q) || true
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
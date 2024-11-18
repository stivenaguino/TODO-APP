pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                // Obtener código del repositorio
                checkout scm
            }
        }
        
        stage('Build') {
            steps {
                // Construir los contenedores
                bat 'docker-compose build'
            }
        }
        
        stage('Test') {
            steps {
                // Aquí puedes agregar tus pruebas
                bat 'echo "Ejecutando pruebas..."'
            }
        }
        
        stage('Deploy') {
            steps {
                // Desplegar la aplicación
                bat 'docker-compose up -d'
            }
        }
    }
    
    post {
        always {
            // Limpiar recursos
            bat 'docker-compose down || true'
        }
        success {
            echo 'Pipeline ejecutado exitosamente!'
        }
        failure {
            echo 'El pipeline ha fallado'
        }
    }
}
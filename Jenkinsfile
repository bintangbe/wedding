pipeline {
    agent any  // Gunakan agen Jenkins yang tersedia

    environment {
        DOCKER_COMPOSE = '/usr/local/bin/docker-compose'  // Sesuaikan dengan path Docker Compose di mesin Jenkins
        IMAGE_NAME = 'my-app'  // Nama image Docker yang akan dibuat
        CONTAINER_NAME = 'website'  // Nama kontainer web
        DOCKER_FILE_PATH = '.'  // Path ke Dockerfile
    }

    stages {

        stage('Hello') {
            steps {
                echo 'Hello World'
            }
        }
        stage('Checkout') {
            steps {
                // Checkout kode dari repository Git
                git 'https://github.com/bintangbe/wedding.git'
            }
        }
        

        stage('Build Docker Image') {
            steps {
                script {
                    // Build image Docker menggunakan Dockerfile
                    sh 'docker-compose -f docker-compose.yml build'
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    // Menjalankan kontainer untuk pengujian
                    sh 'docker-compose -f docker-compose.yml up -d'
                    // Jalankan pengujian yang sesuai (misalnya menggunakan PHPUnit atau pengujian lain)
                    // Contoh pengujian:
                    sh 'docker exec website php /var/www/html/vendor/bin/phpunit --config phpunit.xml'
                }
            }
        }

        stage('Deploy to Staging') {
            steps {
                script {
                    // Deploy aplikasi ke lingkungan staging (misalnya, dengan menjalankan kontainer)
                    sh 'docker-compose -f docker-compose.yml up -d'
                }
            }
        }

        stage('Clean Up') {
            steps {
                script {
                    // Bersihkan kontainer dan image setelah selesai
                    sh 'docker-compose -f docker-compose.yml down'
                    sh 'docker system prune -f'  // Menghapus semua image dan kontainer yang tidak digunakan
                }
            }
        }
    }

    post {
        always {
            // Tindakan yang selalu dijalankan setelah pipeline selesai, misalnya membersihkan log atau memberitahu pengguna
            echo 'Pipeline finished.'
        }

        success {
            // Tindakan untuk kasus sukses, misalnya memberi tahu bahwa build berhasil
            echo 'Build and deploy completed successfully.'
        }

        failure {
            // Tindakan untuk kasus gagal, misalnya memberi tahu

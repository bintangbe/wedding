pipeline {
    agent any

    environment {
        DISCORD_WEBHOOK_URL = 'https://discord.com/api/webhooks/1320970738102173768/kUePVv4-WPKPNAunAKzKfLRs75bO8paz2P4-dBfaFG9DSGE6lCPzdJKIdMJcD_uTw-XZ' // Ganti dengan URL webhook Anda
    }

    stages {
        stage('Checkout Code') {
            steps {
                git 'https://github.com/bintangbe/wedding.git'
            }
        }

        stage('Build') {
            steps {
                echo 'Building the project...'
            // Tambahkan langkah build Anda di sini, misalnya:
            }
        }

        stage('Test') {
            steps {
                echo 'Running tests...'
            // Tambahkan langkah pengujian di sini, misalnya:
            }
        }

        stage('Deploy') {
            steps {
                echo 'Deploying the application...'
            }
        }
    }

    post {
        success {
            script {
                def message = '''
                    {
                        "content": "🎉 Build and Deploy Successful! ✅",
                        "embeds": [
                            {
                                "title": "Pipeline Success",
                                "description": "The Jenkins pipeline completed successfully.",
                                "color": 3066993
                            }
                        ]
                    }
                '''
                sh """
                curl -X POST -H "Content-Type: application/json" \
                -d '${message}' ${DISCORD_WEBHOOK_URL}
                """
            }
        }

        failure {
            script {
                def message = '''
                    {
                        "content": "🚨 Build or Deploy Failed! ❌",
                        "embeds": [
                            {
                                "title": "Pipeline Failed",
                                "description": "The Jenkins pipeline encountered an error.",
                                "color": 15158332
                            }
                        ]
                    }
                '''
                sh """
                curl -X POST -H "Content-Type: application/json" \
                -d '${message}' ${DISCORD_WEBHOOK_URL}
                """
            }
        }

        always {
            echo 'Pipeline completed.'
        }
    }
}

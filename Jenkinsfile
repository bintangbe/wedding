pipeline {
    agent any
    environment {
        DOCKER_IMAGE = 'my-docker-image'
    }
    stages {
        stage('Build') {
            steps {
                script {
                    echo 'Building Docker image...'
                // Proses build docker di sini
                }
            }
        }

        stage('Notify Discord') {
            steps {
                script {
                    def message = [
                        'content': 'Pipeline berhasil',
                        'embeds': [
                            [
                                'title': 'docker build dan push',
                                'description': "Image ${DOCKER_IMAGE} berhasil di push",
                                'color': 3066993
                            ]
                        ]
                    ]
                    // Perhatikan penulisan url dan gunakan tanda kutip yang benar
                    httpRequest(
                        httpMode: 'POST',
                        acceptType: 'APPLICATION_JSON',
                        contentType: 'APPLICATION_JSON',
                        requestBody: groovy.json.JsonOutput.toJson(message),
                        url: 'https://discord.com/api/webhooks/1320970738102173768/kUePVv4-WPKPNAunAKzKfLRs75bO8paz2P4-dBfaFG9DSGE6lCPzdJKIdMJcD_uTw-XZ'
                    )
                }
            }
        }
    }
    post {
        failure {
            script {
                def message = [
                    'content': 'Pipeline gagal',
                    'embeds': [
                        [
                            'title': 'Pipeline gagal',
                            'description': 'Terdapat kesalahan',
                            'color': 15158332
                        ]
                    ]
                ]
                // Perhatikan penulisan url dan gunakan tanda kutip yang benar
                httpRequest(
                    httpMode: 'POST',
                    acceptType: 'APPLICATION_JSON',
                    contentType: 'APPLICATION_JSON',
                    requestBody: groovy.json.JsonOutput.toJson(message),
                    url: 'https://discord.com/api/webhooks/1320970738102173768/kUePVv4-WPKPNAunAKzKfLRs75bO8paz2P4-dBfaFG9DSGE6lCPzdJKIdMJcD_uTw-XZ'
                )
            }
        }
    }
}

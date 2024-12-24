pipeline {
    agent any
    environment {
        DOCKER_IMAGE = 'my-docker-image'
    }
    stages {
    
        stage('Checkout Code') {
            steps {
                echo 'Checkout the Code...'
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



        stage('Notify Discord') {
            steps {
                script {
                    def message = [
                        "content": "Pipeline berhasil",
                        "embeds": [
                            [
                                "title": "docker build dan push",
                                "description": "Image ${DOCKER_IMAGE} berhasil di push",
                                "color": 3066993
                            ]
                        ]
                    ]
                    // Perhatikan penulisan url dan gunakan tanda kutip yang benar
                    httpRequest(
                        httpMode: 'POST',
                        acceptType: 'APPLICATION_JSON',
                        contentType: 'APPLICATION_JSON',
                        requestBody: groovy.json.JsonOutput.toJson(message),
                        url: 'https://discordapp.com/api/webhooks/1320956958429417544/u7p-SDi064-7lnW7xB_xkqwYXfbim9HNXDvC6gxBYN7oOjFm9k8h-9qUl5SroklsSKp2'
                    )
                }
            }
        }
    }
    post {
        failure {
            script {
                def message = [
                    "content": "Pipeline gagal",
                    "embeds": [
                        [
                            "title": "Pipeline gagal",
                            "description": "Terdapat kesalahan",
                            "color": 15158332
                        ]
                    ]
                ]
                // Perhatikan penulisan url dan gunakan tanda kutip yang benar
                httpRequest(
                    httpMode: 'POST',
                    acceptType: 'APPLICATION_JSON',
                    contentType: 'APPLICATION_JSON',
                    requestBody: groovy.json.JsonOutput.toJson(message),
                    url: 'https://discordapp.com/api/webhooks/1320956958429417544/u7p-SDi064-7lnW7xB_xkqwYXfbim9HNXDvC6gxBYN7oOjFm9k8h-9qUl5SroklsSKp2'
                )
            }
        }
    }
}
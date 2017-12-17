pipeline {
    agent any
    stages {

        stage('build') {
            steps {
                sh 'composer install'
            }
        }

        stage('test') {
            steps {
                sh 'php ./vendor/bin/phpunit -c phpunit.xml --log-junit reports/junit/junit.xml\
                 --coverage-html reports/coverage --whitelist src/'
            }
        }

        stage('publish reports') {
            steps {
                parallel (
                    coverage : {
                        publishHTML(
                            target: [
                                reportName: 'CoverageReports',
                                reportDir: 'reports/coverage',
                                keepAll: true
                            ]
                        )
                    }
                )
            }
        }
    }

    post {
        always {
            junit 'reports/junit/*.xml'
        }
    }
}
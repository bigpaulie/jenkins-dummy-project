pipeline {
    agent any
    stages {

        stage('build') {
            steps {
                sh 'composer install'
            }
        }

        stage('code inspection') {
            steps {
                parallel (
                    phpcs: {
                        sh 'php ./vendor/bin/phpcs --report=checkstyle --report-file=reports/checkstyle/checkstyle.xml\
                         src/'
                    }
                )
            }
        }

        stage('test') {
            steps {
                sh 'php ./vendor/bin/phpunit -c phpunit.xml --log-junit reports/junit/junit.xml\
                 --coverage-html reports/coverage --whitelist src/'
            }
            post {
                always {
                    junit 'reports/junit/*.xml'
                }
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
                                reportFiles: 'index.html',
                                keepAll: true
                            ]
                        )
                    },
                    checkstyle: {
                        step(
                            [
                                $class: 'CheckStylePublisher',
                                pattern: 'reports/checkstyle/checkstyle.xml',
                                unstableTotalAll: '999',
                                alwaysLinkToLastBuild: true,
                                usePreviousBuildAsReference: false
                            ]
                        )
                    }
                )
            }
        }
    }

    post {
        always {
            deleteDir()
        }
    }
}
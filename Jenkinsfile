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
                sh 'mkdir -p reports/coverage'
                sh 'php ./vendor/bin/phpunit -c phpunit.xml --log-junit reports/junit/junit.xml\
                 --coverage-clover reports/clover/clover.xml --whitelist src/'
            }
        }

        stage('publish reports') {
            steps {
                parallel (
                    clover : {
                        step(
                            [
                                $class: 'CloverPublisher',
                                cloverReportDir: 'reports/clover',
                                cloverReportFileName: 'clover.xml',
                                healthyTarget: [methodCoverage: 70, conditionalCoverage: 80, statementCoverage: 80],
                                unhealthyTarget: [methodCoverage: 50, conditionalCoverage: 60, statementCoverage: 60],
                                failingTarget: [methodCoverage: 30, conditionalCoverage: 40, statementCoverage: 40]
                            ]
                        )
                        publishHTML(
                            target: [
                                reportName: 'Coverage Reports',
                                reportDir: 'reports/coverage',
                                reportFiles: 'index.html',
                                alwaysLinkToLastBuild: true,
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
            deleteDir()
        }
    }
}
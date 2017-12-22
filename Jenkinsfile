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
                        sh 'mkdir -p reports/checkstyle'
                        sh 'php ./vendor/bin/phpcs --report=checkstyle --report-file=reports/checkstyle/checkstyle.xml\
                         --runtime-set ignore_errors_on_exit 1 --runtime-set ignore_warnings_on_exit 1 src/'
                    },
                    phpcpd: {
                        sh 'mkdir -p reports/cpd'
                        sh 'php ./vendor/bin/phpcpd --log-pmd=reports/cpd/pmd-cpd.xml src/'
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
                    },
                    phpcpd: {
                        step(
                            [
                                $class: 'DryPublisher',
                                canComputeNew: false,
                                defaultEncoding: '',
                                pattern: 'reports/cpd/pmd-cpd.xml',
                                alwaysLinkToLastBuild: true,
                                healthy: '',
                                unHealthy: ''
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
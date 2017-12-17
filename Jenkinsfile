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
                 --coverage-clover reports/clover/clover.xml'
            }
        }

        step([
            $class: 'CloverPublisher',
            cloverReportDir: 'reports/clover',
            cloverReportFileName: 'clover.xml',
            healthyTarget: [methodCoverage: 70, conditionalCoverage: 80, statementCoverage: 80], // optional, default is: method=70, conditional=80, statement=80
            unhealthyTarget: [methodCoverage: 50, conditionalCoverage: 50, statementCoverage: 50], // optional, default is none
            failingTarget: [methodCoverage: 0, conditionalCoverage: 0, statementCoverage: 0]     // optional, default is none
          ])
    }

    post {
        always {
            junit 'reports/junit/*.xml'
            clover 'reports/clover/*.xml'
            deleteDir()
        }
    }
}
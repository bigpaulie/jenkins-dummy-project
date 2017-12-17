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
    }

    post {
        always {
            junit 'reports/junit/*.xml'
            clover 'reports/clover/*.xml'
            deleteDir()
        }
    }
}
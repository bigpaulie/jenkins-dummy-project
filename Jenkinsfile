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
                sh 'php ./vendor/bin/phpunit -c phpunit.xml --log-junit reports/junit/junit.xml'
            }
        }
    }

    post {
        always {
            junit 'reports/junit'
            deleteDir()
        }
    }
}
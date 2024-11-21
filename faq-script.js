
        function toggleAnswer(element) {
            var answer = element.querySelector('p');
            var icon = element.querySelector('.toggle-icon');
            if (answer.style.display === 'block') {
                answer.style.display = 'none';
                icon.style.transform = 'rotate(0deg)';
            } else {
                answer.style.display = 'block';
                icon.style.transform = 'rotate(180deg)';
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            var questions = document.querySelectorAll('.question p');
            var icons = document.querySelectorAll('.toggle-icon');
            questions.forEach(function(question) {
                question.style.display = 'none';
            });
            icons.forEach(function(icon) {
                icon.style.transform = 'rotate(0deg)';
            });
        });

        
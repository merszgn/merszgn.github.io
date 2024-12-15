let currentPage = parseInt(document.body.dataset.page, 10) || 1;

document.addEventListener('DOMContentLoaded', function () {
    fetch('/blog/posts.json')
        .then(response => response.json())
        .then(posts => {
            const readMoreButtons = document.querySelectorAll('.read-more');
            readMoreButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const postId = parseInt(this.dataset.postId, 10);
                    const post = posts.find(p => p.id === postId);
                    console.log(post);
                    if (post) {
                        openModal(post);
                    }
                });
            });
        })
        .catch(error => console.error('Error loading posts:', error));

function updatePageTitle() {
    document.title = `journal, no.${currentPage}`;
}
updatePageTitle();
});
function openModal(post) {
    console.log('Opening modal for:', post);

    const modal = document.createElement('div');
    modal.classList.add('modal');

    const modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    const title = document.createElement('h2');
    title.innerText = post.title || 'Untitled';
    console.log('Title:', title.innerText);

    const date = document.createElement('p');
    date.innerText = post.date || 'No Date';
    date.classList.add('modal-date');
    console.log('Date:', date.innerText);

    let contentElement;

    if (post.password) {
        const form = document.createElement('form');
        form.id = 'password-form';

        const label = document.createElement('label');
        label.setAttribute('for', 'password');
        label.innerText = 'Enter Password:';

        const input = document.createElement('input');
        input.type = 'password';
        input.id = 'password';
        input.placeholder = '(case sensitive!)';

        const submitButton = document.createElement('button');
        submitButton.type = 'submit';
        submitButton.innerText = 'Submit';

        form.appendChild(label);
        form.appendChild(input);
        form.appendChild(submitButton);

        contentElement = form;

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const passwordInput = document.getElementById('password').value;
            if (passwordInput === 'ILOVECINNAMONTOASTCRUNCH') {
                const contentParagraph = document.createElement('p');
                contentParagraph.innerText = post.content;
                form.replaceWith(contentParagraph);
            } else {
                alert('Incorrect password! Hint: look through the blog folder in my github.. ;)');
            }
        });
    } else {
        contentElement = document.createElement('p');
        contentElement.classList.add('modal-content-p'); 
        contentElement.innerHTML = post.content || 'No Content Available';
        console.log('Content:', contentElement.innerText);
    }

    modalContent.appendChild(title);
    modalContent.appendChild(date);
    modalContent.appendChild(contentElement);

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.onclick = closeModal;
    modalContent.appendChild(closeButton);

    modal.appendChild(modalContent);
    document.body.appendChild(modal);
    modalContent.offsetHeight;

    setTimeout(() => {
        modal.classList.add('show');
    }, 10);
}

function closeModal() {
    const modal = document.querySelector('.modal');
    if (modal) {
        modal.classList.remove('show');
        setTimeout(() => {
            modal.remove();
        }, 300);
    }
}
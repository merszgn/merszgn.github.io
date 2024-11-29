let currentPage = parseInt(document.body.dataset.page, 10) || 1;

document.addEventListener('DOMContentLoaded', function () {
    // Fetch the posts.json file to use for modal functionality
    fetch('posts.json')
        .then(response => response.json())
        .then(posts => {
            // Add event listeners to Read More buttons
            const readMoreButtons = document.querySelectorAll('.read-more');
            readMoreButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const postId = parseInt(this.dataset.postId, 10);
                    const post = posts.find(p => p.id === postId);
                    if (post) {
                        openModal(post);
                    }
                });
            });
        })
        .catch(error => console.error('Error loading posts:', error));

    // Set the page title
    updatePageTitle();
});

function updatePageTitle() {
    document.title = `blog, no.${currentPage}`;
}

function openModal(post) {
    const modal = document.createElement('div');
    modal.classList.add('modal');

    const modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    const title = document.createElement('h2');
    title.innerText = post.title || 'Untitled';

    const date = document.createElement('p');
    date.innerText = post.date || 'No Date';
    date.classList.add('modal-date');

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
                alert('Incorrect password! Please try again.');
            }
        });
    } else {
        contentElement = document.createElement('p');
        contentElement.innerText = post.content;
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

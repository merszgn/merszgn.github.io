import json
import os

# Load posts data from posts.json
with open('blog/pages/posts.json', 'r') as file:
    posts = json.load(file)

# Sort posts by ID to ensure they appear in ascending order
posts.sort(key=lambda post: post['id'])

# Number of posts per page
posts_per_page = 3

# Output and template directories
output_dir = 'blog/pages'
template_file = 'blog/blog.html'

# Ensure the output directory exists
os.makedirs(output_dir, exist_ok=True)

# Helper function to create each page
def create_page(posts_to_show, page_number, total_pages):
    with open(template_file, 'r') as template:
        template_content = template.read()

    # Generate the HTML for the posts on this page
    post_previews = ''
    for post in posts_to_show:
        snippet = post['content'][:150] + '...'
        post_preview = f"""
        <div class="post">
            <h3>{post['title']}</h3>
            <p class="post-date">{post['date']}</p>
            <p class="post-snippet">{snippet}</p>
            <button class="read-more" data-post-id="{post['id']}">Read More</button>
        </div>
        """
        post_previews += post_preview

    # Generate pagination buttons
    prev_button = (
        f'<button onclick="location.href=\'page{page_number - 1}.html\'">Previous</button>'
        if page_number > 1 else ''
    )
    next_button = (
        f'<button onclick="location.href=\'page{page_number + 1}.html\'">Next</button>'
        if page_number < total_pages else ''
    )

    pagination = f'<div id="pagination">{prev_button}{next_button}</div>'

    # Replace placeholders in the template
    page_content = template_content.replace('{{ post_previews }}', post_previews)
    page_content = page_content.replace('{{ pagination }}', pagination)
    page_content = page_content.replace('{{ page_title }}', f'Blog - Page {page_number}')
    page_content = page_content.replace('{{ page_number }}', str(page_number))  # Update title with current page number

    # Write the page to a file
    output_file_path = f'{output_dir}/page{page_number}.html'
    with open(output_file_path, 'w') as output_file:
        output_file.write(page_content)

# Pagination logic
total_posts = len(posts)
total_pages = (total_posts + posts_per_page - 1) // posts_per_page  # Round up to cover all posts

for page_number in range(1, total_pages + 1):
    start_index = (page_number - 1) * posts_per_page
    end_index = start_index + posts_per_page
    posts_to_show = posts[start_index:end_index]  # Slice the posts for the current page

    create_page(posts_to_show, page_number, total_pages)

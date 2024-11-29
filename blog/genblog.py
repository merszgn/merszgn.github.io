import json
import os

with open('blog/pages/posts.json', 'r') as file:
    posts = json.load(file)

posts.sort(key=lambda post: post['id'])

posts_per_page = 3

output_dir = 'blog/pages'
template_file = 'blog/blog.html'

os.makedirs(output_dir, exist_ok=True)

def create_page(posts_to_show, page_number, total_pages):
    with open(template_file, 'r') as template:
        template_content = template.read()

    post_previews = ''
    for post in posts_to_show:
        snippet = post['content'][:150] + '...'
        post_preview = f"""
        <div class="post">
            <h2>{post['title']}</h2>
            <p style="font-size: 12px;"><em>{post['date']}</em></p>
            <p id="blogcontent">{post['content']}...</p>
        """
        if index < len(posts_for_page) - 1:
            post_html += "<hr>"
            post_html += "</div>"
        posts_html += post_html

    html_content = template_content.replace('<div class="container" id="posts-container"></div>', f'<div class="container" id="posts-container">{posts_html}</div>')
    html_content = html_content.replace('<title>blog, no.{{page_number}}</title>', f'<title>blog, no.{page_number}</title>')

    previous_page = page_number - 1 if page_number > 1 else total_pages
    next_page = page_number + 1 if page_number < total_pages else 1
    html_content = html_content.replace('{{previous_page}}', f'page{previous_page}.html')
    html_content = html_content.replace('{{next_page}}', f'page{next_page}.html')

    output_file = os.path.join(output_dir, f'page{page_number}.html')
    with open(output_file, 'w') as file:
        file.write(html_content)
    print(f"page {page_number} gen; DEBUG")

for page_number in range(1, total_pages + 1):
    start_index = (page_number - 1) * posts_per_page
    end_index = start_index + posts_per_page
    posts_to_show = posts[start_index:end_index]

    create_page(posts_to_show, page_number, total_pages)

import json
from operator import index
import os
from math import ceil
import html

with open('blog/posts.json', 'r') as file:
    posts = json.load(file)

posts.sort(key=lambda post: post['id'])

posts_per_page = 5
output_dir = 'blog/pages'
template_file = 'blog/blog.html'

os.makedirs(output_dir, exist_ok=True)

total_pages = ceil(len(posts) / posts_per_page)

def create_page(posts_to_show, page_number, total_pages):
    with open(template_file, 'r') as template:
        template_content = template.read()

    posts_html = ''
    for post in posts_to_show:
        post_preview = f"""
        <div class="post">
            <h2 class="post-title">{post['title']}</h2>
            <p  class="post-date">{post['date']}</p>
            <p class="post-snippet">{html.unescape(post['content'][:200] + '...')}</p>
            <button class="read-more" data-post-id="{post["id"]}">Read More</button>
        </div>
        """
        posts_html += post_preview

    html_content = template_content.replace(
        '<div class="posts"><div id="pagination"><a href="{{previous_page}}">previous</a> | <a href="{{next_page}}">next</a></div></div>',
        f'<div class="posts">{posts_html}<div id="pagination"><a href="page{page_number - 1 if page_number > 1 else total_pages}.html">previous</a> | <a href="page{page_number + 1 if page_number < total_pages else 1}.html">next</a></div></div>')
    
    html_content = html_content.replace('<title>journal, no.{{page_number}}</title>', f'<title>journal, no.{page_number}</title>')
    html_content = html_content.replace('<p><i>TOTAL PAGES: {{ total_pages }}</i></p>', f'<p><i>TOTAL PAGES: {total_pages}</i></p>')



    output_file = os.path.join(output_dir, f'page{page_number}.html')
    with open(output_file, 'w') as file:
        file.write(html_content)
    print(f"page {page_number} gen; DEBUG")

for page_number in range(1, total_pages + 1):
    start_index = (page_number - 1) * posts_per_page
    end_index = start_index + posts_per_page
    posts_to_show = posts[start_index:end_index]

    create_page(posts_to_show, page_number, total_pages)

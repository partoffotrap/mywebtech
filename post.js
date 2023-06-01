const renderPostItem = (renderPost) => {
    let postitem = `
    <div>
      <div>postid: ${renderPost.id}</div>
      <div>title: ${renderPost.title}</div>
      <div>body: ${renderPost.body}</div>
    </div>
  `;
    document.querySelector('.post').innerHTML = postitem;
};

const renderCommentItem = (renderCom) => {
    let com = renderCom.map(comment => `
    <div>
      <div> id: ${comment.id}</div>
      <div> name: ${comment.name}</div>
      <div> email: ${comment.email}</div>
      <div> body: ${comment.body}</div>
    </div>
  `).join('');
    document.querySelector('.comments').innerHTML = com;
};

const getPostData = async () => {
    const url = new URLSearchParams(window.location.search);
    const id = url.get('id');

    try {
        const res = await fetch(`https://jsonplaceholder.typicode.com/posts/${id}`);
        const post = await res.json();
        renderPostItem(post);
        const resCom = await fetch(`https://jsonplaceholder.typicode.com/posts/${post.id}/comments`);
        const comment = await resCom.json();
        renderCommentItem(comment);
    } catch (error) {
        alert(error);
    }
};
getPostData();
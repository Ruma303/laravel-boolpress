<template>
    <div>
        <h1>Post</h1>
        <!-- <img :src="'storage/' + post.uploaded_img"
        :alt="post.title"> -->
        <p>Slug: {{ $route.params.slug }}</p>
        <p>Slug: {{ $route.params.description }}</p>
    </div>
</template>

<script>
export default {
    // props: ['slug', 'author'],
}
</script>


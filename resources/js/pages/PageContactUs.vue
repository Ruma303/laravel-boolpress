<template>
    <div>
        <h1>Contact Us</h1>
        <form
        method="post"
        action="/api/leads"
        class="row g-3 mx-2 needs-validation"
        novalidate
        @submit.prevent="submitData"
        >
            <div class="mb-2 col-8">
                <label id="name" class="form-text">Your Full Name</label>
                <input type="text"
                class="form-control"
                :class="{'is-invalid': errors && error.name}"
                id="name"
                name="name"
                value=""
                v-model="name">
                <div class="invalid-feedback">
                     <ul v-if="error && error.name">
                        <li v-for="error in errors.name"
                        :key="error"/>{{errore}}
                    </ul>
                </div>
            </div>
            <div class="mb-2 col-8">
                <label id="email" class="form-text">Your email</label>
                <input type="email"
                class="form-control"
                :class="{'is-invalid': errors && error.email}"
                id="email" name="email"
                value=""
                v-model="email">
                <div class="invalid-feedback">
                    <ul v-if="error && error.name">
                        <li v-for="error in errors.name"
                        :key="error"/>{{errore}}
                    </ul>
                </div>
            </div>
            <div class="mb-2 col-8">
                <label id="message" class="form-text">Your message</label>
                <textarea class="form-control"
                :class="{'is-invalid': errors && error.message}"
                id="message"
                name="message"
                value=""
                rows="5"
                v-model="message"
                placeholder="Write your message here" required maxlength="500" wrap="hard"></textarea>
                <div class="invalid-feedback">
                    <ul v-if="error && error.name">
                        <li v-for="error in errors.name"
                        :key="error"/>{{errore}}
                    </ul>
                </div>
            </div>
            <div class="mb-2 col-12">
                <div id="checkbox" class="form-check">
                <label id="newsletter" class="form-check-label">Sign me up for the Newsletter</label>
                <input type="checkbox"
                class="form-check-input"
                id="newsletter"
                name="newsletter"
                    v-model="newsletter">
                    <div class="invalid-feedback">
                        <ul v-if="error && error.name">
                            <li v-for="error in errors.name"
                            :key="error"/>{{errore}}
                        </ul>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary col-2 mb-3">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'PageContactUs',
    data(){
        return{
            name: '',
            email: '',
            newsletter: true,
            message: '',
            errors: null,
        }
    },
    methods: {
        submitData(){
            this.errors = null;
            axios.post('/api/leads',{
                name:this.name,
                email:this.email,
                newsletter:this.newsletter,
                message:this.message,
            }).then(response => {
                if (response.data.success) {
                    this.resetForm();
                } else {
                    this.errors = response.data.errors;
                }}
            );
        },
        resetForm(){
            this.name = '';
            this.email = '';
            this.newsletter = true;
            this.message = '';
        }
    }
}
</script>

<style>

</style>

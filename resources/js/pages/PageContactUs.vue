<template>
    <div>
        <h1>Contact Us</h1>
        <form method="post" action="/api/leads" novalidate
        @submit.prevent="submitData">
            <div class="mb-3">
                <label id="name" class="form-text">Your Full Name</label>
                <input type="text"
                class="form-control is-invalid" id="name" name="name" value="">
                <div class="invalid-feedback">
                     <ul>
                        <li />
                        <!-- TODO Crea errori -->
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label id="email" class="form-text">Your email</label>
                <input type="email" class="form-control is-invalid" id="email" name="email" value="">
                <div class="invalid-feedback">
                    <ul>
                        <li />
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label id="message" class="form-text">Your message</label>
                <textarea class="form-control is-invalid" id="message" name="message" value="" rows="5" v-model="message"
                placeholder="Write your message here" required maxlength="500" wrap="hard"></textarea>
                <div class="invalid-feedback">
                    <ul>
                        <li />
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <div id="checkbox" class="form-check">
                <label id="checkbox" class="form-check-label">Sign me up for the Newsletter</label>
                    <input type="checkbox" class="form-check-input is-invalid" id="checkbox" name="checkbox" value="" v-model="newsletter">
                    <div class="invalid-feedback">
                        <ul>
                            <li />
                        </ul>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
        }
    },
    methods: {
        submitData(){
            axios.post('/api/leads',{
                name:this.name,
                email:this.email,
                newsletter:this.newsletter,
                message:this.message,
            }).then(response => response.data) // TODO completare
        }
    }
}
</script>

<style>

</style>

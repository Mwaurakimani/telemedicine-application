<template>
    <div class="user-card white_container_card" :class="[mode == 'edit_mode' ? 'user-entry-card' : '']">
        <div class="image-section">
            <div class="image-display">
                <img v-if="user_form.id == null || user_form.profile_photo_path == null"
                     src="/storage/SystemFiles/Images/defualt_user_image.png" alt="">
                <img v-else :src="'/storage/DoctorImages/'+user_form.profile_photo_path" alt="">
            </div>
            <div v-if="user_form.id == null" class="image_form_element">
                <div class="input-group">
                    <label for="">Upload Image</label>
                    <input type="file" @input="user_form.file = $event.target.files[0]">
                </div>
            </div>
        </div>
        <div class="details-section">
            <div v-if="mode == 'view_mode'" class="sect-1">
                <h1>{{ user_form.name }}</h1>
                <h3>{{ user_form.email }}</h3>
            </div>
            <div v-else class="sect-1">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input v-model="user_form.name" type="text" autocomplete="off" class="form-control"
                           placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input v-model="user_form.email" type="text" autocomplete="off" class="form-control"
                           placeholder="email" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <slot v-if="mode == 'view_mode' " name="ratings_section"></slot>
            <div class="sect-2">
                <div v-if="mode == 'view_mode'" class="entry">
                    <label for="">Phone :</label>
                    <p>{{ user_form.phone }}</p>
                </div>
                <div v-else="mode == 'view_mode'" class="flex" style="flex-direction: column">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Phone</span>
                        <input v-model="user_form.phone" type="text" autocomplete="off" class="form-control"
                               placeholder="Phone Number" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div v-if="mode == 'view_mode'" class="entry">
                    <label for="">Address :</label>
                    <p>{{ user_form.address }}</p>
                </div>
                <div v-if="mode == 'edit_mode'" class="flex" style="flex-direction: column">
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Address</span>
                            <textarea v-model="user_form.address" class="form-control" aria-label="With textarea"
                                      placeholder="Address"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="mode == 'view_mode' " class="sect-2">
                <div class="entry">
                    <label for="">DOB :</label>
                    <p>{{ user_form.date_of_birth }}</p>
                </div>
                <div class="entry">
                    <label for="">Gender :</label>
                    <p>{{ user_form.gender }}</p>
                </div>
            </div>
            <div v-else class="sect-2">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">D.O.B</span>
                    <input v-model="user_form.date_of_birth" type="date" autocomplete="off" class="form-control"
                           placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                    <select v-model="user_form.gender" class="form-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "userCard",
    props: {
        mode: {
            type: String,
            default: 'view_mode'
        },
        user_form: {
            type: Object
        }
    }
}
</script>

<style scoped lang="scss">
.user-card, user-entry-card {
    display: flex;
    align-items: center;
    justify-content: left;

    .image-section {
        margin-left: 20px;
        margin-right: 20px;
        width: 200px;
        border-radius: 8px;

        .image-display {
            width: 100%;
            height: 200px;
            margin-bottom: 30px;
        }
    }

    .details-section {
        width: calc(100% - 200px - 50px);
        height: fit-content;
        margin-left: 10px;

        .sect-1:nth-of-type(1) {
            margin-bottom: 20px;

            h1 {
                font-size: 1.4em;
                font-weight: bolder;
                color: dimgrey;
            }
        }

        .sect-2 {
            margin-bottom: 10px;

            .entry {
                display: flex;
                flex-direction: row;

                label {
                    width: 150px;
                }
            }
        }
    }
}

.user-entry-card {
    height: 420px;
    padding-right: 10px;
    align-items: flex-start;
    padding-top: 20px;

    .details-section {
        span, label {
            width: 100px;
        }

        .input-group {
            input, select, textarea {
                border: 1px solid #d2d0d0;
            }
        }
    }
}
</style>



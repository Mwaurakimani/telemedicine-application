<template>
    <div class="appointment-card white_container_card">
        <div class="appointment_card-header">
            <div class="date-section">
                <p>4 April 2022</p>
                <p>05:20 PM</p>
            </div>
            <div class="status-section">
                <h3>Status :</h3>
                <div class="badger badger-active">
                    Pending
                </div>
            </div>
        </div>
        <div class="appointment_card-body">
            <div class="doctor-image">

            </div>
            <div class="doctor-details">
                <h4>Dr. Doctor Name</h4>
                <span>Dentist</span>
                <br>
                <p>Location</p>
            </div>
            <div class="doctor-rating">
                <p>4.5</p>
            </div>
        </div>
        <div class="appointment_card-footer">
            <div class="patient-details">
                <div class="icon_view">
                    <img src="/storage/systemFiles/icons/users.png" alt="">
                </div>
                <p>Mr Username</p>
                |
                <p>Age : 21Y</p>
            </div>
            <div class="viewer">
                <Link :href="route('view_appointments')" as="button">View</Link>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'appointment-card'
}
</script>

<style scoped lang="scss">
.appointment-card {
    width: 370px;
    height: 190px;
    margin-bottom: 40px;

    .appointment_card-header {
        width: 100%;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0px 20px;
        border-bottom: 1px solid #d7d7d7;

        .date-section{
            font-size: 0.9em;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #484848;
        }
        .status-section{
            color: grey;
            display: flex;
            align-items: center;
            justify-content: space-between;
            .badger{
                font-size: 0.9em;
                margin-left: 15px;
                border-radius: 20px;
                color: white;
                padding: 2px 8px;
            }
            .badger-pending{
                background-color: orange;
            }
            .badger-active{
                background-color: #49d57d;
            }
            .badger-reject{
                background-color: red;
            }
            .badger-passed{
                background-color: darkgrey;
            }
        }
    }

    .appointment_card-footer {
        width: 100%;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 15px;

        .viewer{
            button{
                font-size: 0.8em;
                padding: 3px 5px;
                background-color: #00B4CF;
                color: white;
                border-radius: 8px;
            }
        }
        .patient-details{
            width: 250px;
            height: 100%;
            display: flex;
            align-items: center;
            .icon_view{
                width: 30px;
                height: 30px;
                margin-right: 5px;
                padding: 2px;
            }
            p{
                padding: 0 5px;
            }
        }
    }

    .appointment_card-body {
        width: 100%;
        height: calc(100% - 35px - 40px);
        display: flex;
        align-items: center;
        padding: 0 15px;
        border-bottom: 1px solid #d7d7d7;

        .doctor-image{
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid #3BECE6;
        }
        .doctor-details{
            width: 200px;
            padding-left: 10px;
            h4{
                font-weight: bolder;
                color: #00B4CF;
            }
            span{
                display: block;
                font-size: 0.9em;
                color: grey;
                margin-bottom: 8px;
            }
        }
        .doctor-rating{
            font-size: 1.7em;
            width: 40px;
        }
    }

}
</style>

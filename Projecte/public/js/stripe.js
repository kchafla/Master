$("#errors").hide();

const stripe = Stripe('pk_test_51IuPyUAjWB0ChZlOo91RMzIjWymOuejV71HxZs9P1UgHJxZgK0u1rFIYorPiehB5JD5m7EwqWaha7kyhlv2hZUw700j28MLkJ3');

const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');

const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async (e) => {
    e.preventDefault();

    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );

    if (error) {
        $("#errors").show().children().text(error.message);
        setTimeout(function(){ $("#errors").fadeOut(); }, 3000);
    } else {
        $.post("pagar", { _token: $("meta[name='csrf-token']").attr("content"), paymentMethodId: paymentMethod.id });
    }
});
document.addEventListener('submit', event => {
    const form = event.target;
    if (form.dataset.confirm && !window.confirm(form.dataset.confirm)) {
        event.preventDefault();
    }
});

const shipping = document.querySelector('[name="shipping_service_id"]');

if (shipping) {
    const updateTotal = () => {
        const option = shipping.selectedOptions[0];
        const cost = Number(option?.dataset.cost || 0);
        const subtotal = Number(document.querySelector('[data-subtotal]')?.dataset.subtotal || 0);
        const fmt = value => new Intl.NumberFormat('id-ID', {
            style: 'currency', currency: 'IDR', minimumFractionDigits: 2
        }).format(value);
        const costNode = document.querySelector('[data-shipping-total]');
        const totalNode = document.querySelector('[data-order-total]');

        if (costNode) costNode.textContent = shipping.value ? fmt(cost) : 'Pilih ekspedisi';
        if (totalNode) totalNode.textContent = fmt(subtotal + cost);
    };

    shipping.addEventListener('change', updateTotal);
    updateTotal();
}
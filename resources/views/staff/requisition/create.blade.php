<x-app-layout>
<div class="bg-white shadow-md rounded-lg w-full max-w-8xl p-6 overflow-auto" style="max-height: 80vh;">
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Back Button -->
        <div class="mb-4 ms-6">
            <a href="{{ route('staff.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">
                &larr; Back to My Requisitions
            </a>
        </div>
        <h2 class="text-2xl font-semibold mb-4 ms-9">Create New Requisition</h2>

<div id="alert" class="hidden p-4 rounded mb-4 ms-6" style="color:white"></div>


<div class="mb-4 flex space-x-6 ms-6">
    <!-- Select Item -->
    <div class="flex-1">
        <label for="item_id" class="block text-sm font-medium text-gray-700">Select Item</label>
        <select name="item_id" id="item_id" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            <option value="" disabled selected>Select an item</option>
            @foreach ($items as $item)
                @foreach ($item->quantities as $itemQuantity)
                    <option value="{{ $item->id }}"
                        data-cost="{{ optional($item->receipts->first())->cost_per_item }}"
                        data-available="{{ $itemQuantity->quantity }}">
                        {{ $item->name }} - Available: {{ $itemQuantity->quantity }}
                    </option>
                @endforeach
            @endforeach
        </select>
    </div>

    <!-- Quantity -->
    <div class="w-1/2">
        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="1" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
    </div>
</div>


        <form action="{{ route('requisitions.store') }}" method="POST" id="requisition-form">
            @csrf
            <div class="bg-white shadow-md rounded-lg p-6">

                <!-- Item Selection -->

                <button type="button" id="add-item" class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4">Add Item</button>

                <div id="selected-items" class="mb-4">
                    <h3 class="text-lg font-medium">Selected Items:</h3>
                    <table class="min-w-full mt-2 border">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Item Name</th>
                                <th class="border px-4 py-2">Quantity</th>
                                <th class="border px-4 py-2">Cost Per Item</th>
                                <th class="border px-4 py-2">Total Cost</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody id="items-table-body">
                            <!-- Selected items will be dynamically added here -->
                        </tbody>
                    </table>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-medium">Total Cost: <span id="overall-total">Ksh 0.00</span></h3>
                </div>

                <input type="hidden" name="items" id="items-json" value='{}'> <!-- Hidden input for storing items -->

                <div class="mb-4">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                    <textarea name="reason" id="reason" rows="3" required
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
                </div>


                <div>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Requisition</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function showAlert(message, isError) {
            const alertDiv = document.getElementById('alert');
            alertDiv.textContent = message;
            alertDiv.classList.remove('hidden');
            alertDiv.classList.toggle('bg-red-500', isError);
            alertDiv.classList.toggle('bg-green-500', !isError);

            // Make the alert disappear after 4 seconds
            setTimeout(() => {
                alertDiv.classList.add('hidden');
            }, 4000);
        }

        // Object to store added items
        const addedItems = {};

        document.getElementById('add-item').addEventListener('click', function() {
            const itemSelect = document.getElementById('item_id');
            const selectedItem = itemSelect.options[itemSelect.selectedIndex];
            const quantityInput = document.getElementById('quantity');
            const quantity = parseInt(quantityInput.value, 10);
            const availableQuantity = parseInt(selectedItem.getAttribute('data-available'), 10);
            const itemId = selectedItem.value;
            const itemName = selectedItem.text.split(' - ')[0];

            // Clear previous alert messages
            const alertDiv = document.getElementById('alert');
            alertDiv.classList.add('hidden');

            // Validate selection and quantity
            if (selectedItem.value && quantity > 0) {
                // Check if the requested quantity exceeds available quantity
                if (quantity > availableQuantity) {
                    showAlert(`Cannot add ${quantity} of ${itemName}. Only ${availableQuantity} available.`, true);
                    return; // Exit the function if the quantity exceeds availability
                }

                // Check if the item is already added
                if (addedItems[itemId]) {
                    // Update quantity and total cost if already added
                    addedItems[itemId].quantity += quantity;
                    const totalCost = addedItems[itemId].costPerItem * addedItems[itemId].quantity;
                    addedItems[itemId].row.querySelector('.quantity-cell').textContent = addedItems[itemId].quantity;
                    addedItems[itemId].row.querySelector('.total-cost-cell').textContent = `Ksh ${totalCost.toFixed(2)}`;
                    showAlert(`Updated ${itemName} quantity to ${addedItems[itemId].quantity}.`, false);
                } else {
                    // Calculate cost and create a new row for the selected item
                    const costPerItem = parseFloat(selectedItem.getAttribute('data-cost'));
                    const totalCost = costPerItem * quantity;

                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td class="border px-4 py-2">${itemName}</td>
                        <td class="border px-4 py-2 quantity-cell">${quantity}</td>
                        <td class="border px-4 py-2">Ksh ${costPerItem.toFixed(2)}</td>
                        <td class="border px-4 py-2 total-cost-cell">Ksh ${totalCost.toFixed(2)}</td>
                        <td class="border px-4 py-2">
                            <button class="edit-item px-2 py-1 bg-yellow-500 text-white rounded-md">Edit</button>
                            <button class="remove-item px-2 py-1 bg-red-500 text-white rounded-md">Remove</button>
                        </td>
                    `;

                    // Add event listener for the remove button
                    newRow.querySelector('.remove-item').addEventListener('click', function() {
                        delete addedItems[itemId];
                        newRow.remove();
                        updateTotalCost();
                        updateHiddenInput(); // Update hidden input after removal
                        showAlert(`Removed ${itemName}.`, false);
                    });

                    // Add event listener for the edit button
                    newRow.querySelector('.edit-item').addEventListener('click', function() {
                        const newQuantity = prompt(`Edit quantity for ${itemName}:`, addedItems[itemId].quantity);
                        if (newQuantity !== null && newQuantity > 0 && newQuantity <= availableQuantity) {
                            const oldQuantity = addedItems[itemId].quantity;
                            addedItems[itemId].quantity = parseInt(newQuantity, 10);
                            const newTotalCost = addedItems[itemId].costPerItem * addedItems[itemId].quantity;
                            newRow.querySelector('.quantity-cell').textContent = addedItems[itemId].quantity;
                            newRow.querySelector('.total-cost-cell').textContent = `Ksh ${newTotalCost.toFixed(2)}`;
                            updateTotalCost();
                            updateHiddenInput(); // Update hidden input after editing
                            showAlert(`Updated ${itemName} quantity from ${oldQuantity} to ${addedItems[itemId].quantity}.`, false);
                        } else {
                            showAlert('Invalid quantity. Please enter a valid amount.', true);
                        }
                    });

                    document.getElementById('items-table-body').appendChild(newRow);

                    // Store the added item in the object
                    addedItems[itemId] = { quantity, costPerItem, row: newRow };

                    // Show success alert
                    showAlert(`Successfully added ${quantity} of ${itemName}.`, false);
                }

                // Update total cost
                updateTotalCost();
                updateHiddenInput(); // Update hidden input after adding

                // Clear the selection
                itemSelect.selectedIndex = 0;
                quantityInput.value = '';
            } else {
                showAlert('Please select an item and enter a valid quantity.', true);
            }
        });

        // Function to update the total cost
        function updateTotalCost() {
            const rows = document.querySelectorAll('#items-table-body tr');
            let total = 0;
            rows.forEach(row => {
                const totalCostCell = row.cells[3];
                total += parseFloat(totalCostCell.textContent.replace('Ksh ', '').replace(',', ''));
            });
            document.getElementById('overall-total').textContent = `Ksh ${total.toFixed(2)}`;
        }

        // Function to update hidden input with items
        function updateHiddenInput() {
            const itemsJson = JSON.stringify(addedItems);
            document.getElementById('items-json').value = itemsJson;
        }
    </script>
</x-app-layout>

<div class="modal-edit-order">

    <div class="wrapper">

        <h2>Manage Order</h2>

        <i class='bx bx-x' id="modal-close"></i>

        <div class="content">

            <div class="container">

                @if (isset($order))

                <form action="{{ route('update-order', ['id' => $order->id]) }}" method="POST">

                    @method('PUT')

                    @csrf

                    <div class="input-data">
                        <span class="label">Table No.</span>
                        <span class="data">{{ $order->diningTable->table_name }}</span>
                    </div>

                    <div class="order-status">
                        <span class="label">Order Status</span>
                        <div class="status">
                            <span class="data">{{ $order->order_status }}</span>
                            <span class="edit" id="edit-order-status">Change to Completed</span>
                        </div>
                    </div>

                    <div class="food-list-order">
                        <span class="label">Food Order</span>
                        <div class="list">
                            @foreach ($order->customerOrderDetail as $orderDetail)
                                <span>{{ $orderDetail->foodMenu->name }}</span>
                                @if (!$loop->last)
                                    <span>,</span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="button-section">
                        <input type="submit" value="Update Status" disabled>
                        <button type="button" class="cancel"><span>Cancel</span></button>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                </form>

                @else

                <!-- Show the page -->

                @endif

            </div>

        </div>

    </div>

</div>

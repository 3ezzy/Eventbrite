<!DOCTYPE html>
<html>
<head>
    <title>Create Ticket</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        
        
     

        <form action="createTicket" method="POST" class="form">
            <input type="hidden" name="event_id" value="<?= htmlspecialchars($event['event_id']) ?>">
            
            <div class="form-group">
                <label for="ticket_status">Ticket Type</label>
                <select name="ticket_status" id="type" required class="form-control">
                    <option value="regular">Regular</option>
                    <option value="vip">VIP</option>
                    <option value="early_bird">Early Bird</option>
                </select>
            </div>

            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" id="capacity" required 
                       class="form-control" min="1"
                  >
            </div>

            <!-- <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" required 
                       class="form-control" min="0" step="0.01"
                       value="<?= isset($_SESSION['form_data']['price']) ? htmlspecialchars($_SESSION['form_data']['price']) : '' ?>">
            </div> -->


            <button type="submit" class="btn btn-primary">Create Ticket</button>
            <a href="/events/view/<?= htmlspecialchars($event['event_id']) ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <?php unset($_SESSION['form_data']); ?>
</body>
</html>
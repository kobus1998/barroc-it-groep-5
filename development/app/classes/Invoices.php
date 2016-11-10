<?php


class Invoices  {

    private $db;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function getInvoices()
    {
        if (1 == 1) {
            $sql = "SELECT *
                FROM tbl_invoices
                ORDER BY invoice_id DESC
                LIMIT 30 ";
        }

        $stmt = $this->db->pdo->prepare($sql);
        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    public function addInvoice($post, $projectId, $totalPrice)
    {
        $db = Database::getInstance();
        $sql = "INSERT INTO `tbl_invoices` 
        (invoice_nr, price, tax, total, project_id, paid) 
        VALUES 
        (:invoice_nr, :price, :tax, :total, :projectId, 0)";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':invoice_nr', $post['invoice_nr']);
        $stmt->bindParam(':price', $post['price']);
        $stmt->bindParam(':tax', $post['tax']);
        $stmt->bindParam(':total', $totalPrice);
        $stmt->bindParam(':projectId', $projectId);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function increaseNrInvoices($id) {
        $db = Database::getInstance();

        $sqlProject = "SELECT customer_id FROM tbl_projects WHERE project_id = :id";

        $stmtProject = $db->pdo->prepare($sqlProject);
        $stmtProject->bindParam(':id', $id);
        $stmtProject->execute();

        $projectData = $stmtProject->fetchAll();

        $sql = "
            UPDATE tbl_customers
            INNER JOIN tbl_projects
                on tbl_projects.customer_id = tbl_customers.customer_id
            INNER JOIN tbl_invoices
                on tbl_invoices.project_id = tbl_projects.project_id
            SET tbl_customers.number_of_invoices = tbl_customers.number_of_invoices + 1
            WHERE :projectid = tbl_customers.customer_id
            ";
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':projectid', $projectData);
        $stmt->execute();
    }

    public function increaseCustomerBalance($projectId, $price) {
        $db = Database::getInstance();

        $projectQuery = $db->pdo->query("SELECT * FROM tbl_projects WHERE project_id = :projectid");

        $stmtProject = $db->pdo->prepare($projectQuery);
        $stmtProject->bindParam(':projectid', $projectId);
        $stmtProject->execute();

        $projectData = $stmtProject->fetchAll(PDO::FETCH_ASSOC);
        
        $customerId = $projectData[0]['customer_id'];
        
        $sql = "UPDATE `tbl_customers` 
        LEFT JOIN tbl_projects
          on tbl_projects.customer_id = tbl_customers.customer_id
        SET tbl_customers.credit_balance = tbl_customers.credit_balance + :price
        WHERE tbl_customers.customer_id = :id
        ";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $customerId);
        $stmt->execute();

    }

    public function decreaseCustomerBalance($id) {
        $db = Database::getInstance();
        
        $projectIdSql = "SELECT project_id FROM tbl_invoices WHERE invoice_id = :id";

        $stmtIdProject = $db->pdo->prepare($projectIdSql);
        $stmtIdProject->bindParam(':id', $id);
        $stmtIdProject->execute();
        $invoiceId = $stmtIdProject->fetchAll(PDO::FETCH_ASSOC);

        $projectId = $invoiceId[0]['project_id'];

        $projectSql = "SELECT * FROM tbl_projects WHERE project_id = :projectid";
        $stmtIdProject = $db->pdo->prepare($projectIdSql);
        $stmtIdProject->bindParam(':projectid', $projectId);
        $stmtIdProject->execute();
        $project = $stmtIdProject->fetchAll(PDO::FETCH_ASSOC);

        $customerId = $project[0]['customer_id'];
        
        $sql = "UPDATE tbl_customers
                left join tbl_projects
	              on tbl_projects.customer_id = tbl_customers.customer_id
                left join tbl_invoices
	              on tbl_invoices.project_id = tbl_projects.project_id

                SET tbl_customers.credit_balance = tbl_customers.credit_balance - tbl_invoices.price
                WHERE tbl_customers.customer_id = :customerId";
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':customerId', $customerId);
        $stmt->execute();
    }

    public function editInvoice($id) {
        $editPaid = $_POST['edit-paid'];
        $invoiceId = $_GET['invoiceid'];
        $db = Database::getInstance();
        
        $sql = "UPDATE tbl_invoices SET paid = :editPaid WHERE invoice_id = :invoiceId";
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':editPaid', $editPaid);
        $stmt->bindParam(':invoiceId', $invoiceId);
        $stmt->execute();
    }

}
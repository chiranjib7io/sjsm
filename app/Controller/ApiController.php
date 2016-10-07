<?php
App::uses('CakeEmail', 'Network/Email');
class ApiController extends AppController
{
    var $uses = array(
        'User',
        'Organization',
        'Region',
        'Branch',
        'Kendra',
        'Customer',
        'Loan',
        'Saving',
        'Idproof',
        'LogRecord',
        'Country',
        'LoanStatus',
        'SavingsTransaction',
        'LoanTransaction',
        'Setting',
        'Fee',
        'Order');


    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow();
        Configure::write('debug', 2);
    }
    

    function refine_string($string = '')
    {
        if ($string != '') {
            $string = trim(html_entity_decode(strip_tags(stripslashes($string), ''),
                ENT_QUOTES, 'utf-8'));
        }
        return $string;
    }

    function index()
    {
        $this->layout = 'ajax';

    }


    public function login()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            $post_data['password'] = AuthComponent::password($post_data['password']);

            //pr($post_data);
            $device_id = (!empty($post_data["device_id"])) ? $post_data["device_id"] : '';
            $this->User->unBindModel(array('hasMany' => array(
                    'Security',
                    'Region',
                    'Branch',
                    'Kendra'), 'belongsTo' => array('Organization')));
            $chktheuser = $this->User->find('first', array('conditions' => array(
                    'User.email' => @trim($post_data['email']),
                    'User.password' => $post_data['password'],
                    'User.status' => 1)));
            //pr($chktheuser);    die;
            if (!empty($chktheuser)) {
                $data['LogRecord']['user_id'] = $chktheuser['User']['id'];
                $data['LogRecord']['start_time'] = date("Y-m-d H:i:s");
                $data['LogRecord']['device_id'] = $post_data['device_id'];
                $data['LogRecord']['device_type'] = $post_data['device_type'];
                $this->LogRecord->save($data);
                $log_record = $this->LogRecord->getLastInsertID();
                unset($chktheuser['User']['password']);
                unset($chktheuser['User']['username']);
                unset($chktheuser['User']['role']);
                unset($chktheuser['User']['created']);
                unset($chktheuser['User']['modified']);
                unset($chktheuser['User']['status']);
                unset($chktheuser['User']['user_type_id']);
                unset($chktheuser['User']['user_group_id']);
                unset($chktheuser['UserType']['organization_id']);

                $org_data = $this->get_organization_settings_fees_for_app($this->Auth->user('organization_id'));
                $chktheuser['org_data'] = $org_data;

                $outputarr['success'] = '1';
                $outputarr['response'] = $chktheuser;
                $outputarr['response']['log_id'] = $log_record;
            } else {
                $outputarr['success'] = 1;
                $outputarr['response']['msg'] = 'Username or Password Wrong';
            }
        } else {
            $outputarr['success'] = 1;
            $outputarr['response'] = array();
        }
        echo $this->prepare_json($outputarr);
    }

    public function logout()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            // Customer Add
            $data['Customer']['id'] = $post_data['log_id'];
            $data['Customer']['end_time'] = date("Y-m-d H:i:s");

            $this->LogRecord->save($data);
            $outputarr['success'] = '1';
            $outputarr['response']['msg'] = 'Logged out';
            $this->Session->destroy();
            //pr($post_data);
        } else {
            $outputarr['success'] = 1;
            $outputarr['response'] = array();
        }
        echo $this->prepare_json($outputarr);
    }


    public function forgot_password()
    {

        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            $data['User']['email'] = $post_data['email'];

            $emailCount = $this->User->find('first', array('conditions' => array('User.email' =>
                        $data['User']['email'])));


            if (!empty($emailCount)) {

                // Update Password Field
                $id = $emailCount['User']['id'];
                $this->User->id = $id;
                $this->User->saveField("password", "123456");
                $dbEmail = $emailCount['User']['email'];
                // Email Send
                $Email = new CakeEmail();
                $Email->from(array('no-reply@7io.co' => '7io Support'));
                $Email->to($dbEmail);
                $Email->subject('Forgot Password');
                $Email->send('Your Updated Password is: 123456');


                $outputarr['success'] = '1';
                $outputarr['response']['msg'] = 'Password Send to your Email ID';

            } else {
                $outputarr['success'] = 1;
                $outputarr['response']['msg'] = 'Invalid Email ID';
            }
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
        }
        echo $this->prepare_json($outputarr);
    }


    public function create_customer()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            // Insert into Customer Table

            $data['Customer']['cust_fname'] = $post_data['cust_fname'];
            $data['Customer']['cust_lname'] = $post_data['cust_lname'];
            $data['Customer']['cust_dob'] = $post_data['cust_dob'];
            $data['Customer']['cust_sex'] = $post_data['cust_sex'];
            $data['Customer']['cust_address'] = $post_data['cust_address'];
            $data['Customer']['city'] = $post_data['city'];
            $data['Customer']['state'] = $post_data['state'];
            $data['Customer']['country_id'] = $post_data['country_id'];
            $data['Customer']['zip'] = $post_data['zip'];
            $data['Customer']['cust_phone'] = $post_data['cust_phone'];
            $data['Customer']['cust_email'] = $post_data['cust_email'];
            $data['Customer']['organization_id'] = $post_data['organization_id'];
            $data['Customer']['region_id'] = $post_data['region_id'];
            $data['Customer']['branch_id'] = $post_data['branch_id'];
            $data['Customer']['kendra_id'] = $post_data['kendra_id'];
            $data['Customer']['user_id'] = $post_data['user_id'];
            $data['Customer']['guardian_name'] = $post_data['guardian_name'];
            $data['Customer']['created_on'] = date("Y-m-d H:i:s");

            $this->Customer->create();
            $this->Customer->save($data);
            $lastInsertID = $this->Customer->getLastInsertID();

            // Insert into Idproof Table
            $data['Idproof']['id_proof_type'] = $post_data['id_proof_type'];
            $data['Idproof']['id_proof_no'] = $post_data['id_proof_no'];
            $data['Idproof']['customer_id'] = $lastInsertID;

            $this->Idproof->create();
            $this->Idproof->save($data);

            $outputarr['success'] = '1';
            $outputarr['response']['customer'] = $data['Customer'];
            $outputarr['response']['msg'] = 'Customer Created Successfully';

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
        }
        echo $this->prepare_json($outputarr);
    }


    public function search_customer_list()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $conditions['Customer.status'] = 1;
            $conditions['Customer.' . $post_data['search_type']] = $post_data['search_value'];
            $customers_data = $this->Customer->find('all', array('conditions' => $conditions,
                    'recursive' => 1));
            //pr($customers_data);

            if (!empty($customers_data)) {
                $customers = array();
                foreach ($customers_data as $k1 => $customer) {
                    $customers[$k1]['id'] = $customer['Customer']['id'];
                    $customers[$k1]['cust_fname'] = $customer['Customer']['cust_fname'];
                    $customers[$k1]['cust_lname'] = $customer['Customer']['cust_lname'];
                    $customers[$k1]['branch_name'] = $customer['Branch']['branch_name'];
                    $customers[$k1]['kendra_name'] = $customer['Kendra']['kendra_name'] . ' ( ' . $customer['Kendra']['kendra_number'] .
                        ' ) ';
                    $customers[$k1]['created_on'] = $customer['Customer']['created_on'];
                }
                $outputarr['success'] = '1';
                $outputarr['response']['customers'] = $customers;
                $outputarr['response']['msg'] = 'Customer search successful';
            } else {
                $outputarr['success'] = 1;
                $outputarr['response']['msg'] = 'No Record Found';
            }
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }

    public function create_loan()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $count_loan = $this->Loan->find('count');
            $loan_no = 'L-' . $post_data['organization_id'] . '-' . $post_data['customer_id'] .
                '-' . ($count_loan + 1);

            $data['Loan']['loan_number'] = $loan_no;
            $data['Loan']['currency'] = $post_data['currency'];
            $data['Loan']['loan_fee'] = $post_data['loan_fee'];
            $data['Loan']['loan_type'] = $post_data['loan_type'];
            $data['Loan']['organization_id'] = $post_data['organization_id'];
            $data['Loan']['region_id'] = $post_data['region_id'];
            $data['Loan']['branch_id'] = $post_data['branch_id'];
            $data['Loan']['kendra_id'] = $post_data['kendra_id'];

            $data['Loan']['customer_id'] = $post_data['customer_id'];
            $data['Loan']['loan_principal'] = $post_data['loan_principal'];
            $data['Loan']['loan_interest'] = $post_data['loan_interest'];
            $data['Loan']['loan_period_unit'] = $post_data['loan_period_unit'];
            $data['Loan']['loan_period'] = $post_data['loan_period'];
            $data['Loan']['loan_repay_total'] = $post_data['loan_repay_total'];
            $data['Loan']['security_fee'] = $post_data['security_fee'];
            $data['Loan']['loan_guranter1'] = $post_data['loan_guranter1'];
            $data['Loan']['loan_guranter1_phone'] = $post_data['loan_guranter1_phone'];
            $data['Loan']['loan_guranter2'] = $post_data['loan_guranter2'];
            $data['Loan']['loan_guranter2_phone'] = $post_data['loan_guranter2_phone'];
            $data['Loan']['loan_purpose'] = $post_data['loan_purpose'];
            $data['Loan']['loan_rate'] = $post_data['loan_rate'];
            $data['Loan']['loan_date'] = $post_data['loan_date'];
            $data['Loan']['user_id'] = $post_data['user_id'];
            $data['Loan']['created_on'] = date("Y-m-d H:i:s");

            $this->Loan->create();
            $this->Loan->save($data);
            $lastInsertID = $this->Loan->getLastInsertID();

            $outputarr['success'] = '1';
            $outputarr['response']['msg'] = 'Loan Created Successfully';
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }

    public function customer_details()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $cust_id = $post_data['customer_id'];
            $cust_data = $this->Customer->find('first', array('conditions' => array('Customer.id' =>
                        $cust_id), 'recursive' => 1));
            if (!empty($cust_data)) {

                unset($cust_data['Customer']['user_id']);
                unset($cust_data['Customer']['country_id']);
                unset($cust_data['Customer']['cust_occup']);

                $outputarr['success'] = '1';

                $outputarr['response']['Customer'] = $cust_data['Customer'];
                $outputarr['response']['Customer']['country'] = $cust_data['Country']['name'];
                $outputarr['response']['Customer']['added_by'] = $cust_data['User']['first_name'] .
                    ' ' . $cust_data['User']['last_name'];
                $outputarr['response']['Customer']['organization_name'] = $cust_data['Organization']['organization_name'];
                $outputarr['response']['Customer']['region_name'] = $cust_data['Region']['region_name'];
                $outputarr['response']['Customer']['branch_name'] = $cust_data['Branch']['branch_name'];
                $outputarr['response']['Customer']['kendra_name'] = $cust_data['Kendra']['kendra_name'];
                //$outputarr['response']['Customer']['Loans'] = $cust_data['Loan'];
                $outputarr['response']['Customer']['Savings']['id'] = $cust_data['Savings']['id'];
                $outputarr['response']['Customer']['Savings']['savings_date'] = $cust_data['Savings']['savings_date'];
                $outputarr['response']['Customer']['Savings']['savings_amount'] = $cust_data['Savings']['savings_amount'];
                $outputarr['response']['Customer']['Savings']['current_balance'] = $cust_data['Savings']['current_balance'];
                $outputarr['response']['Customer']['Savings']['modified_on'] = $cust_data['Savings']['modified_on'];
                $outputarr['response']['Customer']['SavingsTransaction'] = $cust_data['SavingsTransaction'];

                $loan_summary = $this->customer_loan_summary($cust_id);
                $order_summary = $this->customer_order_summary($cust_id);
                //pr($loan_details);
                $outputarr['response']['Customer']['LoanSummary'] = $loan_summary;
                $outputarr['response']['Customer']['OrderSummary'] = $order_summary;
                if (!empty($cust_data['Loan'])) {
                    foreach ($cust_data['Loan'] as $l => $loan) {
                        $loan_id = $loan['id'];
                        $loan_data = $this->Loan->find('first', array('conditions' => array('Loan.id' =>
                                    $loan_id, 'Loan.loan_status_id !=' => '6')));

                        //pr($loan_data);
                        if (!empty($loan_data)) {
                            $outputarr['response']['Customer']['Loans'][$l]['id'] = $loan_data['Loan']['id'];
                            $outputarr['response']['Customer']['Loans'][$l]['loan_number'] = $loan_data['Loan']['loan_number'];
                            $outputarr['response']['Customer']['Loans'][$l]['loan_date'] = $loan_data['Loan']['loan_date'];
                            $outputarr['response']['Customer']['Loans'][$l]['loan_principal'] = $loan_data['Loan']['loan_principal'];
                            $outputarr['response']['Customer']['Loans'][$l]['loan_interest'] = $loan_data['Loan']['loan_interest'];
                            $outputarr['response']['Customer']['Loans'][$l]['loan_repay_total'] = $loan_data['Loan']['loan_repay_total'];
                            $outputarr['response']['Customer']['Loans'][$l]['currency'] = $loan_data['Loan']['currency'];
                            $outputarr['response']['Customer']['Loans'][$l]['loan_rate'] = $loan_data['Loan']['loan_rate'];
                            $outputarr['response']['Customer']['Loans'][$l]['loan_period'] = $loan_data['Loan']['loan_period'];
                            $outputarr['response']['Customer']['Loans'][$l]['loan_period_unit'] = $loan_data['Loan']['loan_period_unit'];
                            $outputarr['response']['Customer']['Loans'][$l]['created_on'] = $loan_data['Loan']['created_on'];
                            $outputarr['response']['Customer']['Loans'][$l]['added_by'] = $loan_data['User']['first_name'] .
                                ' ' . $loan_data['User']['last_name'];
                            $outputarr['response']['Customer']['Loans'][$l]['status'] = $loan_data['LoanStatus']['status_name'];

                            $outputarr['response']['Customer']['Loans'][$l]['total_overdue']['LoanSummary'] =
                                $this->loan_summary($loan_data['Loan']['id']);

                            $outputarr['response']['Customer']['Loans'][$l]['LoanTransactions'] = $loan_data['LoanTransaction'];
                        } else {
                            $outputarr['response']['Customer']['Loans'] = '';
                        }
                    }
                } else {
                    $outputarr['response']['Customer']['Loans'] = '';
                }


                $outputarr['response']['msg'] = 'Customer Details Fetch Successful';
            } else {
                $outputarr['success'] = 1;
                $outputarr['response'] = array();
                $outputarr['response']['msg'] = 'No Data Found';
            }

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }


    public function loan_details()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);

            $loan_id = $post_data['loan_id'];
            $loan_data = $this->Loan->find('first', array('conditions' => array('Loan.id' =>
                        $loan_id)));

            //pr($loan_overdue);

            //$outputarr['response']['Loan'] = $loan_data['Loan'];
            //$outputarr['response']['Loan']['status'] = $loan_data['LoanStatus']['status_name'];
            if (!empty($loan_data)) {
                $outputarr['success'] = '1';
                $outputarr['response']['Loan']['id'] = $loan_data['Loan']['id'];
                $outputarr['response']['Loan']['loan_number'] = $loan_data['Loan']['loan_number'];
                $outputarr['response']['Loan']['loan_date'] = $loan_data['Loan']['loan_date'];
                $outputarr['response']['Loan']['loan_principal'] = $loan_data['Loan']['loan_principal'];
                $outputarr['response']['Loan']['loan_interest'] = $loan_data['Loan']['loan_interest'];
                $outputarr['response']['Loan']['loan_repay_total'] = $loan_data['Loan']['loan_repay_total'];
                $outputarr['response']['Loan']['currency'] = $loan_data['Loan']['currency'];
                $outputarr['response']['Loan']['loan_rate'] = $loan_data['Loan']['loan_rate'];
                $outputarr['response']['Loan']['loan_period'] = $loan_data['Loan']['loan_period'];
                $outputarr['response']['Loan']['loan_period_unit'] = $loan_data['Loan']['loan_period_unit'];
                $outputarr['response']['Loan']['created_on'] = $loan_data['Loan']['created_on'];
                $outputarr['response']['Loan']['added_by'] = $loan_data['User']['first_name'] .
                    ' ' . $loan_data['User']['last_name'];
                $outputarr['response']['Loan']['status'] = $loan_data['LoanStatus']['status_name'];

                $outputarr['response']['Loan']['LoanSummary'] = $this->loan_summary($loan_data['Loan']['id']);

                $outputarr['response']['Loan']['Customer']['id'] = $loan_data['Customer']['id'];
                $outputarr['response']['Loan']['Customer']['customer_name'] = $loan_data['Customer']['cust_fname'] .
                    ' ' . $loan_data['Customer']['cust_lname'];

                $outputarr['response']['Loan']['Organization']['id'] = $loan_data['Organization']['id'];
                $outputarr['response']['Loan']['Organization']['organization_name'] = $loan_data['Organization']['organization_name'];

                $outputarr['response']['Loan']['Region']['id'] = $loan_data['Region']['id'];
                $outputarr['response']['Loan']['Region']['region_name'] = $loan_data['Region']['region_name'];

                $outputarr['response']['Loan']['Branch']['id'] = $loan_data['Branch']['id'];
                $outputarr['response']['Loan']['Branch']['branch_name'] = $loan_data['Branch']['branch_name'];

                $outputarr['response']['Loan']['Kendra']['id'] = $loan_data['Kendra']['id'];
                $outputarr['response']['Loan']['Kendra']['kendra_name'] = $loan_data['Kendra']['kendra_name'];
                $outputarr['response']['Loan']['Kendra']['kendra_number'] = $loan_data['Kendra']['kendra_number'];

                $outputarr['response']['Loan']['LoanTransactions'] = $loan_data['LoanTransaction'];

                $outputarr['response']['msg'] = 'Loan Details Fetch Successful';
            } else {
                $outputarr['success'] = 1;
                $outputarr['response'] = array();
                $outputarr['response']['msg'] = 'No Data Found';
            }

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }

    public function kendra_loan_details()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);

            $kendra_id = $post_data['kendra_id'];
            $kendra_data = $this->Kendra->find('first', array('conditions' => array('Kendra.id' =>
                        $kendra_id)));
            $kendra_loan_data = $this->Loan->find('all', array('conditions' => array(
                    'Loan.kendra_id' => $kendra_id,
                    'Loan.loan_status_id' => '3',
                    'Loan.status' => 1)));

            if (!empty($kendra_loan_data)) {
                $outputarr['success'] = '1';
                //pr($kendra_data);
                $outputarr['response']['Kendra']['id'] = $kendra_data['Kendra']['id'];
                $outputarr['response']['Kendra']['kendra_name'] = $kendra_data['Kendra']['kendra_name'];
                $outputarr['response']['Kendra']['kendra_number'] = $kendra_data['Kendra']['kendra_number'];

                $outputarr['response']['Kendra']['total_customers'] = count($kendra_data['Customer']);

                $outputarr['response']['Kendra']['Organization']['id'] = $kendra_data['Organization']['id'];
                $outputarr['response']['Kendra']['Organization']['organization_name'] = $kendra_data['Organization']['organization_name'];

                $outputarr['response']['Kendra']['Region']['id'] = $kendra_data['Region']['id'];
                $outputarr['response']['Kendra']['Region']['region_name'] = $kendra_data['Region']['region_name'];

                $outputarr['response']['Kendra']['Branch']['id'] = $kendra_data['Branch']['id'];
                $outputarr['response']['Kendra']['Branch']['branch_name'] = $kendra_data['Branch']['branch_name'];

                foreach ($kendra_loan_data as $k => $loan_data) {
                    $outputarr['response']['Kendra']['LoanSummary'][] = $this->loan_summary($loan_data['Loan']['id']);
                }

                $outputarr['response']['msg'] = 'Kendra Wise Loan Details Fetch Successful';
            } else {
                $outputarr['success'] = 1;
                $outputarr['response'] = array();
                $outputarr['response']['msg'] = 'No Data Found';
            }

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);


    }


    public function single_loan_collection()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);


            $kendra_id = $post_data['kendra_id'];
            $due_on = $post_data['installment_due_date'];
            $insta_no = $post_data['installment_no'];
            $cust_arr = $post_data['cust_arr'];

            $this->loan_amount_collection($kendra_id, $due_on, $insta_no, $cust_arr);

            $outputarr['success'] = '1';
            $outputarr['response']['msg'] = 'Single Customer Loan Collection Successful';
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);

    }

    public function kendra_loan_collection()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);


            $kendra_id = $post_data['kendra_id'];
            $due_on = $post_data['installment_due_date'];
            $insta_no = $post_data['installment_no'];
            $cust_arr = $post_data['cust_arr'];

            $this->loan_amount_collection($kendra_id, $due_on, $insta_no, $cust_arr);

            $outputarr['success'] = '1';
            $outputarr['response']['msg'] = 'Kendra Loan Collection Successful';
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);

    }


    public function officer_loan_details()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $user_id = $post_data['user_id'];

            $user_data = $this->User->find('first', array('conditions' => array('User.id' =>
                        $user_id)));
            //pr($user_data);
            if (!empty($user_data)) {

                $branch_list = $this->Branch->find('list', array('fields' => array('id',
                            'branch_name'), 'conditions' => array('Branch.organization_id' => $user_data['Organization']['id'])));


                $loan_officer_summery['user_id'] = $user_id;
                $loan_officer_summery['first_name'] = $user_data['User']['first_name'];
                $loan_officer_summery['last_name'] = $user_data['User']['last_name'];
                $loan_officer_summery['image'] = $user_data['User']['image'];
                $loan_officer_summery['address'] = $user_data['User']['address'];
                $loan_officer_summery['city'] = $user_data['User']['city'];
                $loan_officer_summery['state'] = $user_data['User']['state'];
                $loan_officer_summery['email'] = $user_data['User']['email'];
                $loan_officer_summery['user_type'] = $user_data['UserType']['user_type'];
                $loan_officer_summery['organization_id'] = $user_data['Organization']['id'];
                $loan_officer_summery['organization_name'] = $user_data['Organization']['organization_name'];
                $loan_officer_summery['branch_id'] = $user_data['Branch']['id'];
                $loan_officer_summery['branch_name'] = $user_data['Branch']['branch_name'];

                $loan_officer_summery['phone_no'] = $user_data['User']['phone_no'];
                $loan_officer_summery['phone_no'] = $user_data['User']['phone_no'];
                $loan_officer_summery['phone_no'] = $user_data['User']['phone_no'];
                $loan_officer_summery['phone_no'] = $user_data['User']['phone_no'];


                $loan_officer_summery['no_of_kendra'] = count($user_data['Kendra']);
                $loan_officer_summery['no_of_customer'] = count($user_data['Customer']);

                $count_loop = 0;
                $total_loan = 0;
                $total_loan_in_market = 0;
                $total_realisable = 0;
                $total_realise = 0;
                $total_overdue = 0;
                $percent_paid = 0;


                foreach ($user_data['Kendra'] as $kenid => $kendradetails) {
                    $kid = $kendradetails['id'];
                    $loan_payment_list = $this->LoanTransaction->find('all', array(
                        'fields' => array(
                            'LoanTransaction.insta_due_on',
                            'LoanTransaction.insta_paid_on',
                            'SUM(LoanTransaction.total_installment) as total_installment',
                            'SUM(LoanTransaction.insta_principal_paid) as total_principal_paid',
                            'SUM(LoanTransaction.insta_interest_paid) as total_interest_paid'),
                        'conditions' => array(
                            'Loan.kendra_id' => $kid,
                            'Loan.loan_status_id' => 3,
                            'Loan.status' => 1),
                        'joins' => array(array(
                                'table' => 'loans',
                                'alias' => 'Loan',
                                'type' => 'inner',
                                'foreignKey' => true,
                                'conditions' => array('Loan.id = LoanTransaction.loan_id'))),
                        'group' => 'LoanTransaction.insta_due_on'));

                    $kendra_details = $this->kendra_details($kid);

                    //$loan_officer_summery['kendra_loan_transaction'][$kid]['kendra_id'] = $kid;
                    //$loan_officer_summery['kendra_loan_transaction'][$kid]['loan_payment_list'] = $loan_payment_list;
                    if (!empty($loan_payment_list)) {
                        $count_loop = $count_loop + 1;
                        $total_loan = $total_loan + $kendra_details['Kendra']['total_loan'];
                        $total_loan_in_market = $total_loan_in_market + $kendra_details['Kendra']['total_loan_in_market'];
                        $total_realisable = $total_realisable + $kendra_details['Kendra']['total_realisable'];
                        $total_realise = $total_realise + $kendra_details['Kendra']['total_realise'];
                        $total_overdue = $total_overdue + $kendra_details['Kendra']['total_overdue'];
                        $percent_paid = $percent_paid + $kendra_details['Kendra']['percent_paid'];
                    }
                    //pr($kendra_details);die;
                }

                $loan_officer_summery['total_loan'] = $total_loan;
                $loan_officer_summery['total_loan_in_market'] = $total_loan_in_market;
                $loan_officer_summery['total_realisable'] = $total_realisable;
                $loan_officer_summery['total_realise'] = $total_realise;
                $loan_officer_summery['total_overdue'] = $total_overdue;
                $loan_officer_summery['percent_paid'] = ($count_loop > 0) ? round(($percent_paid /
                    $count_loop), 2) : 0;


                //pr($loan_officer_summery);
                $outputarr['success'] = '1';
                $outputarr['response']['LoanOfficer'] = $loan_officer_summery;
                $outputarr['response']['msg'] = 'Loan Officer Details Fetch Successful';
            } else {
                $outputarr['success'] = 1;
                $outputarr['response'] = array();
                $outputarr['response']['msg'] = 'No Data Found';
            }

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);

    }

    //{"kendra_id":"1","cust_arr":{"1":"125"},"user_id":"6","upload_type":"ANDROID"}
    public function single_savings_collection()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);

            $kendra_id = $post_data['kendra_id'];
            $upload_type = $post_data['upload_type'];
            $user_id = $post_data['user_id'];
            $cust_arr = $post_data['cust_arr'];

            $this->savings_amount_collection($kendra_id, $cust_arr, $user_id, $upload_type);

            $outputarr['success'] = '1';
            $outputarr['response']['msg'] = 'Single Customer Savings Collection Successful';
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);

    }


    //{"kendra_id":"1","cust_arr":{"1":"125"},"user_id":"6","upload_type":"ANDROID"}
    public function kendra_savings_collection()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);

            $kendra_id = $post_data['kendra_id'];
            $upload_type = $post_data['upload_type'];
            $user_id = $post_data['user_id'];
            $cust_arr = $post_data['cust_arr'];

            $this->savings_amount_collection($kendra_id, $cust_arr, $user_id, $upload_type);

            $outputarr['success'] = '1';
            $outputarr['response']['msg'] = 'Kendra Savings Collection Successful';
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);

    }

    public function kendra_customer_list()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $kendra_id = $post_data['kendra_id'];
            $this->Customer->unBindModel(array('belongsTo' => array(
                    'Organization',
                    'Region',
                    'Branch',
                    'Kendra',
                    'User',
                    'Country'), 'hasMany' => array(
                    'Loan',
                    'Idproof',
                    'Order',
                    'SavingsTransaction')));
            $customer_list = $this->Customer->find('all', array('conditions' => array('Customer.kendra_id' =>
                        $kendra_id, 'Customer.status' => 1)));
            //pr($customer_list);

            if (!empty($customer_list)) {
                $outputarr['success'] = 1;
                $outputarr['response']['Customers'] = $customer_list;
                $outputarr['response']['msg'] = 'Customer List Fetch Successful';
            } else {
                $outputarr['success'] = 1;
                $outputarr['response'] = array();
                $outputarr['response']['msg'] = 'No Data Found';
            }

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }


    public function loan_prepayment()
    {

        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);

            $loan_id = $post_data['loan_id'];
            $kendra_id = $post_data['kendra_id'];
            $payment_on = $post_data['payment_date'];
            $cust_id = $post_data['customer_id'];

            $loan_trans_list = $this->LoanTransaction->find('all', array(
                'conditions' => array(
                    'Loan.id' => $loan_id,
                    'LoanTransaction.loan_id' => $loan_id,
                    'LoanTransaction.insta_principal_paid' => 0),
                'joins' => array(array(
                        'table' => 'loans',
                        'alias' => 'Loan',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('Loan.id = LoanTransaction.loan_id'))),
                'group' => 'LoanTransaction.insta_due_on'));
            //pr($loan_trans_list);die;
            foreach ($loan_trans_list as $trans_row) {
                $cust_arr[$cust_id] = $trans_row['LoanTransaction']['total_installment'];
                $due_date = $trans_row['LoanTransaction']['insta_due_on'];
                $insta_no = $trans_row['LoanTransaction']['insta_no'];
                $this->loan_amount_collection($kendra_id, $due_date, $insta_no, $cust_arr);
            }

            $outputarr['success'] = 1;
            $outputarr['response']['msg'] = 'Customer Pre Payment Successful';

        } else {
            $outputarr['success'] = 0;
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);

    }

    public function loan_overdue_payment()
    {

        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);

            $loan_id = $post_data['loan_id'];
            $kendra_id = $post_data['kendra_id'];
            $payment_on = $post_data['payment_date'];
            $cust_id = $post_data['customer_id'];


            $loan_overdue_list = $this->LoanTransaction->find('all', array('conditions' =>
                    array(
                    'LoanTransaction.loan_id' => $loan_id,
                    'LoanTransaction.insta_due_on <=' => date("Y-m-d"),
                    'LoanTransaction.insta_principal_paid' => 0)));
            //pr($loan_overdue_list);die;
            foreach ($loan_overdue_list as $trans_row) {
                $cust_arr[$cust_id] = $trans_row['LoanTransaction']['total_installment'];
                $due_date = $trans_row['LoanTransaction']['insta_due_on'];
                $insta_no = $trans_row['LoanTransaction']['insta_no'];
                $this->loan_amount_collection($kendra_id, $due_date, $insta_no, $cust_arr);
            }

            $outputarr['success'] = 1;
            $outputarr['response']['msg'] = 'Customer Overdue Payment Successful';

        } else {
            $outputarr['success'] = 0;
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);

    }


    public function kendra_security_deposite_list()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $kendra_id = $post_data['kendra_id'];
            $loans_list = $this->Loan->find('all', array('conditions' => array(
                    'Loan.loan_status_id' => 6,
                    'Loan.is_security_fee_returned' => 0,
                    'Loan.kendra_id' => $kendra_id)));
            $loan_cust_list = array();
            foreach ($loans_list as $k => $loan_row) {
                $loan_cust_list[$k]['id'] = $loan_row['Customer']['id'];
                $loan_cust_list[$k]['name'] = $loan_row['Customer']['cust_fname'] . ' ' . $loan_row['Customer']['cust_lname'];
                $loan_cust_list[$k]['fees'] = '';
                $loan_cust_list[$k]['loan_id'] = '';
                $cid = $loan_row['Customer']['id'];
                $res_arr = array('loan_id' => 0, "fees" => 0);
                if ($cid > 0) {
                    $loans = $this->Loan->find('first', array('conditions' => array(
                            'Loan.loan_status_id' => 6,
                            'Loan.is_security_fee_returned' => 0,
                            'Loan.customer_id' => $cid)));
                    if ($loans['Loan']['security_fee'] > 0) {
                        $loan_cust_list[$k]['fees'] = $loans['Loan']['security_fee'];
                        $loan_cust_list[$k]['loan_id'] = $loans['Loan']['id'];
                    }

                }


            }
            //pr($loan_cust_list);

            if (!empty($loan_cust_list)) {
                $outputarr['success'] = 1;
                $outputarr['response']['Customers'] = $loan_cust_list;
                $outputarr['response']['msg'] = '';
            } else {
                $outputarr['success'] = 1;
                $outputarr['response'] = array();
                $outputarr['response']['msg'] = 'No Data Found';
            }

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }


    public function security_deposite_return()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $loan_id = $post_data['loan_id'];
            $this->Loan->id = $loan_id;

            if ($this->Loan->exists()) {
                $this->Loan->saveField('is_security_fee_returned', 1);
                $outputarr['success'] = 1;
                $outputarr['response']['msg'] = 'Security fees refunded';
            } else {
                $outputarr['success'] = 0;
                $outputarr['response']['msg'] = 'No data found';
            }


        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }


    public function change_password()
    {

        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            $this->User->id = $post_data['id'];
            $password = $post_data['password'];

            if ($this->User->exists()) {
                // Update Password Field
                $this->User->saveField("password", $password);
                $outputarr['success'] = '1';
                $outputarr['response']['msg'] = 'Password Changed Successful';

            } else {
                $outputarr['success'] = 1;
                $outputarr['response']['msg'] = 'No Data Found';
            }
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }


    public function kendra_customer_savings_list()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $kendra_id = $post_data['kendra_id'];
            $savings_list = $this->Saving->find('all', array('conditions' => array('Saving.status' =>
                        1, 'Saving.kendra_id' => $kendra_id)));

            foreach ($savings_list as $k => $loan_row) {
                $loan_cust_list[$k]['id'] = $loan_row['Customer']['id'];
                $loan_cust_list[$k]['name'] = $loan_row['Customer']['cust_fname'] . ' ' . $loan_row['Customer']['cust_lname'];
                $loan_cust_list[$k]['current_balance'] = $loan_row['Saving']['current_balance'];
            }
            //pr($loan_cust_list);

            if (!empty($loan_cust_list)) {
                $outputarr['success'] = 1;
                $outputarr['response']['Customers'] = $loan_cust_list;
                $outputarr['response']['msg'] = '';
            } else {
                $outputarr['success'] = 1;
                $outputarr['response'] = array();
                $outputarr['response']['msg'] = 'No Data Found';
            }

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }

    public function savings_withdrawn()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $kendra_id = $post_data['kendra_id'];
            $customer_id = $post_data['customer_id'];
            $saving_amount = $post_data['savings_amount'];
            $upload_type = $post_data['upload_type'];

            $saving_data = $this->Saving->find('first', array('conditions' => array(
                    'Saving.status' => 1,
                    'Saving.kendra_id' => $kendra_id,
                    'Saving.customer_id' => $customer_id)));
            //pr($saving_data); die;

            //pr($this->request->data);die;
            $user_id = $post_data['added_by'];
            $recipt_date = date('Y-m-d H:i:s');

            $organization_id = $saving_data['Organization']['id'];
            $region_id = $saving_data['Region']['id'];
            $branch_id = $saving_data['Branch']['id'];
            $kendra_id = $saving_data['Kendra']['id'];
            $cust_id = $customer_id;
            $savings_amt = $saving_amount;

            // Savings Table Updation
            $savings_arr['Saving']['id'] = $saving_data['Saving']['id'];
            $savings_arr['Saving']['current_balance'] = $saving_data['Saving']['current_balance'] -
                $savings_amt;
            $savings_arr['Saving']['modified_on'] = $recipt_date;
            $savings_arr['Saving']['user_id'] = $user_id;

            //pr( $savings_arr); die;

            // Saving Transaction Table
            $savings_arr['SavingsTransaction']['saving_id'] = $saving_data['Saving']['id'];
            $savings_arr['SavingsTransaction']['transaction_on'] = $recipt_date;
            $savings_arr['SavingsTransaction']['amount'] = $savings_amt;
            $savings_arr['SavingsTransaction']['transaction_type'] = 'Withdrawn';
            $savings_arr['SavingsTransaction']['balance'] = $savings_arr['Saving']['current_balance'];
            $savings_arr['SavingsTransaction']['customer_id'] = $cust_id;
            $savings_arr['SavingsTransaction']['organization_id'] = $organization_id;
            $savings_arr['SavingsTransaction']['upload_type'] = $upload_type;
            $savings_arr['SavingsTransaction']['branch_id'] = $branch_id;
            $savings_arr['SavingsTransaction']['kendra_id'] = $kendra_id;
            $savings_arr['SavingsTransaction']['created_on'] = $recipt_date;
            $savings_arr['SavingsTransaction']['user_id'] = $this->Auth->user('id');

            //pr( $savings_arr); die;

            $this->Saving->clear();
            $this->SavingsTransaction->clear();
            $this->Saving->save($savings_arr);
            $this->SavingsTransaction->save($savings_arr);


            $outputarr['success'] = 1;
            $outputarr['response']['msg'] = 'Saving Amount Withdrawn Successful';

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }


    public function kendraDetails()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $kendra_id = $post_data['kendra_id'];
            $this->Kendra->id = $kendra_id;

            if ($this->Kendra->exists()) {

                $kendra_details = $this->kendra_details($kendra_id);

                $outputarr['success'] = 1;
                $outputarr['response']['kendra_details'] = $kendra_details;
                $outputarr['response']['msg'] = 'Kendra Details Fetch Successful';
            } else {
                $outputarr['success'] = 0;
                $outputarr['response']['msg'] = 'No Data Found';
            }
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }
    
    
    
    public function dashboard()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            $id = $post_data['id'];

            $outputarr['success'] = 1;
            $outputarr['response']['dashboard'] = '';
            $outputarr['response']['msg'] = 'Dashboard Details Fetch Successful';
        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
            $outputarr['response']['msg'] = 'Wrong Request Send';
        }
        echo $this->prepare_json($outputarr);
    }
    
    public function product_order()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $post_data = json_decode($this->request->data, true);
            //pr($post_data);
            // Insert into Customer Table
            $cid = $post_data['cust_id'];
            $this->Customer->id = $cid;

            if ($this->Customer->exists()) {
                $data['Customer']['cust_fname'] = $post_data['cust_fname'];
                $data['Customer']['cust_lname'] = $post_data['cust_lname'];
                $data['Customer']['cust_address'] = $post_data['cust_address'];
                $data['Customer']['city'] = $post_data['city'];
                $data['Customer']['state'] = $post_data['state'];
                $data['Customer']['zip'] = $post_data['zip'];
                $data['Customer']['cust_phone'] = $post_data['cust_phone'];
                $data['Customer']['organization_id'] = $post_data['organization_id'];
                $data['Customer']['branch_id'] = $post_data['branch_id'];
                $data['Customer']['kendra_id'] = $post_data['kendra_id'];
                $data['Customer']['user_id'] = $post_data['user_id'];
                $data['Customer']['created_on'] = date("Y-m-d H:i:s");
    
                $this->Customer->create();
                $this->Customer->save($data);
                $lastInsertID = $this->Customer->getLastInsertID();
            }else{
                $lastInsertID = $cid;
            }
            
            

            $outputarr['success'] = '1';
            $outputarr['response']['msg'] = 'Order Successfully Saved6';

        } else {
            $outputarr['success'] = 0;
            $outputarr['response'] = array();
        }
        echo $this->prepare_json($outputarr);
    }


}



?>
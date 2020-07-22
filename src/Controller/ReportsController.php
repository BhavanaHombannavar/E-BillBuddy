<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;


class ReportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function salesByCustomer(){
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $frmdate = (new Date($data['from_date']))->format('Y-m-d');
            $todate = (new Date($data['to_date']))->format('Y-m-d');

            $rows = [];
            $this->loadModel('Customers');

            $customers = $this->Customers->find('all', [
                'contain' => [
                    'Orders' => function ($q) use ($frmdate, $todate) {
                        return $q->where([
                            'AND' => [
                                ['Orders.order_date >= ' => $frmdate],
                                ['Orders.order_date <= ' => $todate]
                            ]
                        ]);
                    },
                    'CustomerTypes', 'Addresses', 'Orders.Payments', 'Orders.OrderItems']
                ]);
            // pr($customers); die();
            foreach ($customers as $customer) {
                $row = [];
                $count = 0;

                $row['name'] = $customer->name;

                foreach ($customer->orders as $order) {
                    if ($order) {
                        $count++;
                        $totalPaid = 0;
                        foreach ($order->payments as $payment) {
                            $totalPaid += $payment->amount;
                        }
                        $row['total_sales'] = $order->total_amount;
                        $row['total_paid'] = $totalPaid;
                    }
                    // $row['count'] = $count;
                    $rows[$customer->id][] = $row;
                }
            }
            /*pr($rows);
            die();*/
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'engine' => 'CakePdf.Mpdf',
                    'orientation' => 'portrait',
                    'filename' => 'Sales By Customers' . '.pdf'
                ]
            ]);
        }

        $this->set(compact('rows', 'frmdate', 'todate'));
        $this->set('_serialize', ['rows'], ['frmdate'], ['todate']);
    }

    public function salesByDate(){

        if ($this->request->is('post')) {

           $data = $this->request->data(); 

           $frmdate = (new Date($data['from_date']))->format('Y-m-d');
           $todate = (new Date($data['to_date']))->format('Y-m-d');

           $this->loadModel('Orders');

           $conditions = array('Orders.order_date >=\''.$frmdate.'\'AND Orders.order_date <=\'' .$todate.'\'');

        $orders = $this->Orders->find('all', array( 
               'conditions'=>$conditions));

           $this->viewBuilder()->options([
            'pdfConfig' => [
                'engine' => 'CakePdf.Mpdf',
                'orientation' => 'portrait',
                'filename' => 'Sales By Customers' . '.pdf'
            ]
        ]);
       }
       $this->set(compact('orders', 'frmdate', 'todate'));
       $this->set('_serialize', ['orders', 'frmdate', 'todate']);
   }
}
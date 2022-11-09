# Import Core by Amasty
<h3>The package presented is a free version of the import solution for Magento 2. Install together with the <a href="https://github.com/AmastyLtd/module-export-core" target="_blank">Export Core</a> and <a href="https://github.com/AmastyLtd/module-import-export-core" target="_blank">Import\Export Core</a> to see the full scope of data transfer features between multiple platforms. The code and architecture are the same as in the original paid <a href="https://amasty.com/import-and-export-for-magento-2.html" target="_blank">Import and Export for Magento 2</a> extension but the core includes core functionality only and is suitable for manual data transfer. See the full scope of automatization features and entities available in the paid version <a href="https://export-extensions-m2.magento-demo.amasty.com/admin/amorderimport/profile/index/" target="_blank">in this demo</a> or <a href="https://calendly.com/yuliya-simakovich/book-a-demo" target="_blank">book a live demo</a> with the Amasty team to get a real-time consultation.</h3>

![164422017-b74751b7-9afc-47f8-9ef1-8533f327f7af](https://user-images.githubusercontent.com/104132415/194509327-de30b3e2-feea-430a-a423-e85f713143cb.png)

The paid version can be purchased as Lite, Pro and Premium packages. <a href="https://amasty.com/import-and-export-for-magento-2.html#choose_option" target="_blank">Visit our website</a> to see the pricing plans. A free package is the Lite version of the full <a href="https://amasty.com/import-and-export-for-magento-2.html" target="_blank">Import and Export for Magento 2</a> extension, but without ready-made entities for migration.

<h2>What is the Core package for?</h2>
<p>Import Core is used to upload data to the Magento 2 platform. The extension is built from scratch and has no intersections with the native import/export functionality developed by Magento itself. Even though a free package does not include any ready-made entities for import jobs, you can create compatibility with any entity you need and add them to the migration functionality available.</p>
<h2>Free version features</h2>
<p>The package helps you to:</p>
<ul>
<li><b>Perform manual one-time import of any entity:</b> the solution adds a separate interface that you can use for data migration but without the automatization options. It means that each import job is supposed to be configured separately and can’t be run automatically.</li>
<li><b>Choose import behavior:</b> add, update, delete information or add/update simultaneously.</li>
<li><b>Use 2 file formats:</b> CSV and XML formats are ready to use.</li>
<li><b>Use 2 sources for data storage:</b> upload files directly to the admin panel or extract them from local directories.</li>
<li><b>Match file settings during import:</b>map field names provided in a file with the Magento database to import data correctly.</li>
<li><b>Automatically modify the values:</b> use text, numeric, date or custom modifiers to change the values before importing or exporting (round prices, change the date, capitalize product names and so on). </li>
<li><b>Use filters:</b> import only relevant data by filtering the information presented in the file by any parameter.</li>
<li><b>Change performance settings:</b> choose the number of parallel processes according to your server capabilities.</li>
</ul>
<h2>Installation</h2>
<p>To install the package, run the following commands:</p>
<code>composer require amasty/module-export-core</code><br>
<code>php bin/magento setup:upgrade</code><br>
<code>php bin/magento setup:di:compile </code><br>
<code>php bin/magento setup:static-content:deploy (your locale)</code><br>
<br>
<p>See more details in the <a href="https://amasty.com/docs/doku.php?id=magento_2:composer_user_guide" target="_blank">Composer User Guide</a>. </p>
<h2>Import Configuration & Flow</h2>
<p>To import data successfully, you need to create compatibility with the required entity. Let’s see how it works in the free version using the ‘Orders’ entity as an example.</p>
<h3>Import Configuration</h3>
<p>The logic of the import process has a tree structure. It means that first, you identify the key entities you want to upload (e.g. ‘Order’) and then you can add some specific subentities that you need (e.g. ‘Order Item’, ‘Order Shipment’, etc.).</p>

![164430753-613b68ab-3ce8-42e8-9881-6bc7116f9772](https://user-images.githubusercontent.com/104132415/200798896-4ab7ef2f-6270-484f-a09e-fad1342c99ba.png)

<h4>Step 1. Set the behavior </h4>
<p>Add, update or delete the data provided in the file from Magento. </p>

![164431381-9255b0e4-12b8-413e-b9cf-207896c89f19](https://user-images.githubusercontent.com/104132415/200799195-25e7a7d6-8f81-4bd5-af16-cf3953606da5.png)

<p>Choose validation strategy: it is possible to skip errors or stop the process if there are some. </p>

<h4>Step 2. Choose file type</h4>
<p>You can use either CSV or XML files.</p>

![164431713-cdb343ac-555e-4d5c-b03d-7f4bd5874fd8](https://user-images.githubusercontent.com/104132415/200799454-2029da20-cc62-477f-b614-e48d86bc9194.png)

<h4>Step 3. Specify import source </h4>

<p>Here you can upload the file manually or specify the path of the local directory.</p>

![164432062-07c7bf18-40b4-46cf-9f05-e7cdfb29a316](https://user-images.githubusercontent.com/104132415/200799594-f9aecbc1-d097-419a-a7ae-bcd3274cbbc3.png)

<h4>Step 4. Configure fields mapping</h4>
<p>Closely review the file you want to transfer —  add the fields, subentities and match column names so that Magento could extract data correctly.</p> 
<p>See the detailed description <a href="https://amasty.com/docs/doku.php?id=magento_2:import_and_export#fields_configuration1" target="_blank">in this section</a> of the guide. </p>

![164432739-6863f041-e27e-459b-8c75-9d46f676c76e](https://user-images.githubusercontent.com/104132415/200800011-8dd7b2be-1755-4b50-a30f-5ecb174261c5.png)

<p>Please, note that Magento has a number of required fields that should be added to import data. Each entity has specific obligatory fields. Find out more about the must-have fields for the common entities <a href="https://amasty.com/blog/what-is-the-minimum-set-of-required-fields-for-importing-products-customers-and-orders/" target="_blank">in this article.</p>
<p>Use the sample file provided in the settings to simplify data upload and avoid mistakes.</p>

![164433194-5d55898a-1dad-42d8-ac69-cdf0d7d6342c](https://user-images.githubusercontent.com/104132415/200800277-37931dcf-797a-4338-9263-b000ca669ee2.png)

<h4>Step 5. Activate filtering</h4>
<p>No need to sort data provided in the file manually — activate specific filters if you want to transfer only relevant information.</p>

![164439525-b56ce598-5d5a-4730-a58c-31f634a93e2a](https://user-images.githubusercontent.com/104132415/200800470-8dbcd11f-4c50-4bfd-90fe-da110238e6c9.png)

<h4>Step 6. Check the configuration </h4>
<p>If ready, click the Check Data button to validate the settings. </p>

![164439944-e8e076b9-02b2-463b-99a9-7c12ba06f5d4](https://user-images.githubusercontent.com/104132415/200800767-77942dc1-068f-4e1f-aadd-0a7b3eb7afdf.png)

<p>Correct the mistakes (if there are any) and retry. If the configuration is correct, you can start the importing process.</p>

![164440238-1852d596-ca8b-4ddd-961b-93ccc64f2ff0](https://user-images.githubusercontent.com/104132415/200800844-a6572a67-0e93-4f85-a5e7-bcda8b679637.png)

<h2>Full Version Overview & Pricing Plans</h2>
<p>The full solution has <a href="https://amasty.com/import-and-export-for-magento-2.html#choose_option" target="_blank">3 pricing plans</a>: Lite, Pro and Premium. Unlike the free package, full versions let you import and export orders, products, customers, CMS blocks and other entities without additional development.</p> 

![164440741-77997267-6ebb-4bde-ad1f-0d8653f77fdc](https://user-images.githubusercontent.com/104132415/194514095-0025fa14-e30e-47d8-998f-94c67d732239.png)


<h3>Key features of each solution:</h3>
<h4>Lite</h4> 
<ul>
<li><b>Manual import/export tasks</b> (has the same interface as the free version)</li>
<li><b>3 ready-made entities:</b> order, product, customer</li>
<li><b>2 file formats:</b> CSV, XML</li>
<li><b>2 sources:</b> file upload/local directory</li>
</ul>
<h4>Pro</h4>
<ul>
<li><b>One-time manual import/export tasks</b> (has the same interface as the free version)</li>
<li><b>Additional interface</b> to automate import and export tasks using cron jobs</li>
<li><b>3 entities:</b> order, product, customer</li>
<li><b>6 file formats:</b> CSV, XML, ODS, XLSX, Template, JSON</li>
<li><b>9 file sources:</b> File Upload, FTP/SFTP, Direct URL, Google Sheets, REST API Endpoint, Dropbox, Google Drive, Email for export</li>
<li><b>Export history</b></li>
 </ul>
<h4>Premium </h4>
<ul>
<li><b>Fully automated data synchronization</b> of all entities using profiles</li>
<li><b>Automatic profiles execution</b></li>
<li><b>One-time manual import/export tasks</b></li>
<li><b>9 entities:</b> orders, products, customers, CMS blocks and pages, URL rewrites, EAV attributes, catalog price rules, cart price rules, search terms and synonyms </li>
<li><b>Automation using cron jobs</b></li>
<li><b>6 file formats:</b> CSV, XML, ODS, XLSX, Template, JSON</li>
<li><b>9 file sources:</b> File Upload, FTP/SFTP, Direct URL, Google Sheets, REST API Endpoint, Dropbox, Google Drive, Email for export</li>
<li><b>Import/export histories</b> and profile running logs</li>
 </ul>
<p class="text-align: center"><a href="https://amasty.com/import-and-export-for-magento-2.html">Import and Export Premium</a></p>

![key-entities-new](https://user-images.githubusercontent.com/104132415/164442050-b760b264-419f-4630-872b-4d813c132118.png)

If you need a specific entity, but with the automation options, you can purchase the main ones separately:  
<br>
-> <a href="https://amasty.com/import-orders-for-magento-2.html" target="_blank">Import Orders</a><br>
-> <a href="https://amasty.com/export-orders-for-magento-2.html" target="_blank">Export Orders</a><br>
-> <a href="https://amasty.com/import-products-for-magento-2.html" target="_blank">Import Products</a><br>
-> <a href="https://amasty.com/export-products-for-magento-2.html" target="_blank">Export Products</a><br>
-> <a href="https://amasty.com/import-customers-for-magento-2.html" target="_blank">Import Customers</a><br>
-> <a href="https://amasty.com/export-customers-for-magento-2.html" target="_blank">Export Customers</a><br>
<h2>Troubleshooting </h2>
<p><i>Have any questions? Feel free to <a href="https://amasty.com/contacts/">contact us</a>!</i></p> 
<p><i>Want us to develop a custom integration? <a href="https://amasty.com/magento-integration-service.html">Find the details here</a>.</i></p>  

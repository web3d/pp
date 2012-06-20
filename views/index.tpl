<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Jimmy's Profilo</title>
        <link rel="stylesheet" href="/static/images/style.css" type="text/css" media="screen" />
    </head>

    <body>
    <div id="wrapper">
    <div class="container">
        <h1>Jimmy's Profilo</h1>

        <?php if($this->aboutme):?>
        <div class="aboutme"><?php echo $this->aboutme;?></div>
        <?php endif; ?>
        
        <?php if (is_array($this->blogs)): ?>
            <h2>My Blog:</h2>
            <oul>
                
                <?php foreach ($this->blogs as $key => $val): ?>
                    <li>
                        <a href="<?php $this->eprint($val['link']); ?>"><?php $this->eprint($val['title']); ?></a></td>
                        <p><?php $this->eprint($val['description']); ?></p>
                    </li>
                <?php endforeach; ?>
                
            </ol>
            
        <?php else: ?>
            
            <p>There are no books to display.</p>
            
        <?php endif; ?>
        </div>
    </div>   
    </body>
</html>

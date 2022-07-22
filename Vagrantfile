# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.
  
  #   config.ssh.username = 'vagrant'
  #   config.ssh.password = 'vagrant'

  config.vm.box = "HK2-Magento24"
 	config.vm.network "private_network", ip: "192.168.56.10"
 
  # Default HTTP port
	config.vm.network "forwarded_port", guest: 80, host: 8080, auto_correct: true
	# MySQL port
	config.vm.network "forwarded_port", guest: 3306, host: 33060
	
  # If You Want to Use RSYNC
  config.vm.synced_folder "./www", "/var/www/ww2", type: "rsync", rsync__exclude: ".git/"

    # If You Want to Use NFS UnComment & Comment RSYNC
  # config.vm.synced_folder "./www", "/var/www", type: "nfs", create: true


  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  
	config.vm.provider "virtualbox" do |vb|
  # Customize the amount of memory on the VM:
		vb.memory = "7168"  
		vb.name = "Vagrant_MagentoCloud"
	# Fixing issue of VM loosing sync of the date and time while sleeping.
		vb.customize ['guestproperty', 'set', :id, '/VirtualBox/GuestAdd/VBoxService/--timesync-set-threshold', 10000] 
	end
  
  
  # Enable provisioning with a shell script. Additional provisioners such as
  # Ansible, Chef, Docker, Puppet and Salt are also available. Please see the
  # documentation for more information about their specific syntax and use.
  config.vm.provision "shell", inline: <<-SHELL
      sudo sysctl net.ipv6.conf.all.disable_ipv6=1
  SHELL

end
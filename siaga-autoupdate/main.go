package main

import (
	"fmt"
	"os/exec"
	"time"
)

func main() {

	// auto-update siaga folder setiap 1 menit
	for {

		removeOldSiaga()
		gitCloneSiaga()
		storageLinkSiaga()

		// lakukan sleep selama 1 menit
		time.Sleep(1 * time.Minute)
	}

}

func removeOldSiaga() {

	cmd := exec.Command("rm", "-rf", "/var/www/html/server-siaga-skripsi/")
	stdout, err := cmd.Output()
	if err != nil {
		fmt.Println(err.Error())
		return
	}
	fmt.Println(string(stdout))

}

func gitCloneSiaga() {

	cmd := exec.Command("git", "clone", "https://github.com/JoniJonnez/server-siaga-skripsi.git")
	stdout, err := cmd.Output()
	if err != nil {
		fmt.Println(err.Error())
		return
	}
	fmt.Println(string(stdout))

}

func storageLinkSiaga() {

	cmd := exec.Command("cd", "server-siaga-skripsi")
	stdout, err := cmd.Output()
	if err != nil {
		fmt.Println(err.Error())
		return
	}
	fmt.Println(string(stdout))

	cmd = exec.Command("php", "artisan", "storage:link")
	stdout, err = cmd.Output()
	if err != nil {
		fmt.Println(err.Error())
		return
	}
	fmt.Println(string(stdout))

}

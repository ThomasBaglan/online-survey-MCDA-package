
#set the the working directory where the pictures will be saved

#Get the arguments from the PhP script (the 5 chosen criteria)

args <- commandArgs(TRUE)
c1<-args[1]
c2<-args[2]
c3<-args[3]
c4<-args[4]
c5<-args[5]

# set up criteria parameters
criteria <- c(c1,c2,c3,c4,c5)
criteriaMinMax <- c("max","max","max","max","max")
names(criteriaMinMax) <- criteria

# set up categories parameters
categories <- c("Good","Neutral","Bad")
categoriesRanks <- c(1,2,3)
names(categoriesRanks) <- categories

# generate the initial set of unique alternatives
pT <- unique(matrix(sample.int(5, 1000, T), 100, 5))[1:25,] - 3
rownames(pT) <- 1:dim(pT)[1]
colnames(pT) <- criteria

#save the unique pT information
setwd("online-survey-MCDA-package/data") #set the the working directory where pT.csv will be saved
write.csv(pT, file="pT.csv", sep=",")

#generate 25 profile graphics as pictures, so they can be used in a html/php script
#25 profiles are already created in the folder "images", the following script will replace them
#If it doesn't change the images, check the folder writing permission
setwd("online-survey-MCDA-package/images") #set the the working directory where the pictures will be saved
for(i in 1:25) {
  name<-paste("profile",i,sep="_")
  finalname<-paste(name,"png",sep=".")
  png(filename=finalname, width=800, height=500)
  plot(pT[i,1:5], xlim = c(1,5), ylim = c(-2, 2),xlab="", ylab="", xaxt="n",yaxt="n", tck=1, main=paste("Profile",i), type="o", pch=16, col="red", cex=2)
  axis(1, at=c(1:5), labels=criteria, tck=1, cex.axis=0.7, font.axis=2, angle=45)
  axis(2, at=c(-2:2), labels=c("very \n bad", "bad", "neutral", "good", "very \n good"), las=1, tck=1)
  dev.off()
}

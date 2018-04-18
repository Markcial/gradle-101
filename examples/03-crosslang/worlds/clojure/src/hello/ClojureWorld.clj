(ns hello.ClojureWorld
  (:gen-class
   :methods [[hello [] String]]))

(defn -hello [this] (println "Hello from clojure"))
